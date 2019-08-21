<?php
/**
 * App class
 */
class App
{
    private $_url = null;
    private $_controller = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        // Sets the private $url
        $this->_getUrl();

        // Load the default controller if no url is set
        if (empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }

        // Load the existing controller if url is set
        $this->_loadExistingController();

        // Call the controller method
        $this->_callControllerMethod();
    }

    /**
     * Fetches the $_GET from url
     * 
     * @return void
     */
    private function _getUrl()
    {
        $this->_url = isset($_GET['url']) ? $_GET['url'] : null;
        $this->_url = rtrim($this->_url, '/');
        $this->_url = filter_var($this->_url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $this->_url);
    }

    /**
     * This loads if there is no GET parameter passed
     * 
     * @return void
     */
    private function _loadDefaultController()
    {
        include 'controllers/index.php';
        $this->_controller = new Index();
        $this->_controller->index();
    }

    /**
     * Load an existing controller if there is a GET parameter passed
     * 
     * @return void
     */
    private function _loadExistingController()
    {
        $file = 'controllers/' . $this->_url[0] . '.php';
        if (file_exists($file)) {
            include $file;
            $this->_controller = new $this->_url[0];
            $this->_controller->loadModel($this->_url[0]);
        } else {
            $this->error("Die Seite \"{$this->_url[0]}\" existiert nicht!");   
        }
    }

    /**
     * If a method is passed in the GET url parameter
     * 
     * @return void
     */
    private function _callControllerMethod()
    {
        // calling methods output error or load index page
        if (isset($this->_url[3])) {
            if (method_exists($this->_controller, $this->_url[1])) {
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
            } else {
                $this->error("Parameter \"{$this->_url[2]}\" oder \"{$this->_url[3]}\" in \"{$this->_url[1]}\" existiert nicht!");
            }
        } elseif (isset($this->_url[2])) {
            if (method_exists($this->_controller, $this->_url[1])) {
                $this->_controller->{$this->_url[1]}($this->_url[2]);
            } else {
                $this->error("Parameter \"{$this->_url[2]}\" in \"{$this->_url[1]}\" existiert nicht!");
            }
        } else {
            if (isset($this->_url[1])) {
                if (method_exists($this->_controller, $this->_url[1])) {
                    $this->_controller->{$this->_url[1]}();
                } else {
                    $this->error("Methode \"{$this->_url[1]}\" existiert nicht!");
                }
            } else {
                $this->_controller->index();
            }
        }
    }

    /**
     * This handles the error message
     * 
     * @param string $msg The error message
     * 
     * @return false
     */
    public function error($msg = '')
    {
        include 'controllers/error.php';
        $this->_controller = new ErrorHandler();
        $this->_controller->index($msg);
        return false;
    }
}

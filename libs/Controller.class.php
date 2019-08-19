<?php
/**
 * Controller class
 */
class Controller
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->view = new View();
    }

    /**
     * This function is the model loader
     * 
     * @param string $name The model name to load
     * 
     * @return void
     */
    public function loadModel($name)
    {
        $path = 'models/' . $name . '_model.php';
        if (file_exists($path)) {
            include 'models/' . $name . '_model.php';

            $modelName = $name . '_Model';
            $this->model = new $modelName();
        }
    }
}
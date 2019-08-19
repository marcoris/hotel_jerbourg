<?php
/**
 * View class
 */
class View
{
    /**
     * The render function
     * 
     * @param string $name The filename
     * @param boolean $noInclude If the view is with header and footer or not
     * 
     * @return void
     */
    public function render($name, $noIncludes = false)
    {
        if ($noIncludes == true) {
            include 'views/' . $name . '.php';
        } else {
            include 'views/header.php';
            include 'views/' . $name . '.php';
            include 'views/footer.php';
        }
    }
}

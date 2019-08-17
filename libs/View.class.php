<?php

class View
{
    /**
     * The render function
     * 
     * @param string $name - The filename
     * @param boolean $noInclude - If the view is with header and footer or not
     */
    public function render($name, $noIncludes = false)
    {
        if ($noIncludes == true) {
            require 'views/' . $name . '.php';
        } else {
            require 'views/header.php';
            require 'views/' . $name . '.php';
            require 'views/footer.php';
        }
    }
}

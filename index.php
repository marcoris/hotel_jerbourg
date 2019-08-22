<?php

require 'config.php';
require 'debugging.php';

spl_autoload_register('classLoader');

/**
 * PHP class loader
 * 
 * @param string $class The classname
 * 
 * @return void
 */
function classLoader($class)
{
    if (file_exists("libs/$class.class.php")) {
        include "libs/$class.class.php";
    }

    if (file_exists("util/$class.class.php")) {
        include "util/$class.class.php";
    }
}

$app = new App();

<?php

require 'config.php';
require 'debugging.php';

spl_autoload_register('classLoader');

function classLoader($class)
{
    if (file_exists("libs/$class.class.php")) {
        require "libs/$class.class.php";
    }

    if (file_exists("util/$class.class.php")) {
        require "util/$class.class.php";
    }
}

$app = new App();
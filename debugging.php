<?php

/**
 * This function returns an array beautyfied and is for debugging purposes
 * 
 * @param array $array the array to display beautyfied
 * 
 */
function pvd($array)
{
    $data = debug_backtrace(DEBUG_BACKTRACE_PROVIDE_OBJECT, 1);
    
    echo $data[0]["function"] . "::".$data[0]["file"]."->".$data[0]["line"]."<br>";
    echo "<pre title='".$data[0]["file"]."->".$data[0]["line"]."'>";
    var_dump($array);
    echo "</pre>";
}

<?php

function my_autoloader($file){
    require './../helpers/' . $file . '_helper.php';
}

spl_autoload_register('my_autoloader');


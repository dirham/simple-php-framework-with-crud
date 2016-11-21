<?php

spl_autoload_register(function ($ClassName) {
        // get directory
        $dir_separator = DIRECTORY_SEPARATOR;
        $dir = __DIR__;

        // change sparator to get class name
        $class = str_replace('\\', $dir_separator, $ClassName);

        // get full name and preparing requrired file
        $file = "{$dir}{$dir_separator}{$class}.php";

        // get file if it is readable
        if (is_readable($file)) {
            require_once $file;
        }
});
<?php

spl_autoload_register(function($class){
    $filePath = '../'.str_replace('\\','/',$class.'.php');
    // echo "Trying to include: $filePath<br>";
    require($filePath);
});

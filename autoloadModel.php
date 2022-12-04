<?php
spl_autoload_register('autoloadModel');
function autoloadModel($className){
    $path = 'model/';
    $extension = ".class.php";
    $fullpath = $path . $className . $extension;
    include_once $fullpath;
}

?>
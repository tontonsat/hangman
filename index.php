<?php

namespace App;

session_start();
require_once 'app/config/appConfig.php';
require_once 'app/core/Autoloader.php';

Autoloader::register();

/**
* CTRL_NS is our base namespace string.
* VIEW_PATH is our base url string, used to require our view files.
* WEB_PATH is not used yet.
*/
define("CTRL_NS", "App\Src\Controller\\");
define("VIEW_PATH", "./app/view/");
define("WEB_PATH", "./public/");

$defaultCtrlname = "GameController";
$defaultMethod   = "indexAction";

if(isset($_GET['ctrl'])){
    $ctrlname = ucfirst($_GET['ctrl'])."Controller";
}
else {
    $ctrlname = $defaultCtrlname;
}
$ctrlname = CTRL_NS.$ctrlname;

if(class_exists($ctrlname)) {
    $controller = new $ctrlname();
}
else{
    header("Location:404.php");
    die();
}

if(isset($_GET['action'])){
    $method = $_GET['action']."Action";
    if(method_exists($controller, $method)) {
        if(isset($_GET['id'])){
            $result = $controller->$method($_GET['id']);
        }
        else{
            $result = $controller->$method();
        }
    }
}

$result = (!isset($result)) ? $controller->$defaultMethod() : $result;

$view  = $result['view'];
$data = $result['data'];

require_once 'app/view/layout.php';

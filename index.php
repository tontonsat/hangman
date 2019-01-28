<?php

namespace App;

session_start();
// require_once 'app/config/appConfig.php';
// require_once 'app/core/Autoloader.php';
//
// Autoloader::register();

/**
* CTRL_NS is our base namespace string.
* VIEW_PATH is our base url string, used to require our view files.
* WEB_PATH is not used yet.
*/
// define("CTRL_NS", "App\Src\Controller\\");
define("VIEW_PATH", "./app/view/");
//
// if(!empty($_GET['init'])) {
//     $game = new Game();
//     $game->indexAction();
// }

require_once 'app/view/layout.php';

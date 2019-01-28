<?php

session_start();
require_once $_SERVER['DOCUMENT_ROOT']. '/app/config/appConfig.php';
require_once 'app/core/Autoloader.php';

Autoloader::register();

use App\Src\Model\Modules\Word\WordDAO as Word;

$word = new Word();

if(!empty($_GET['init'])) {
    $randWord = $word->getRandomWord();
    initGame();
}

function initGame() {
    $_SESSION['word'] = $randWord;
    $data = array();
    $data[] = "test1";
    $data[] = "test2";

    echo $data;
}

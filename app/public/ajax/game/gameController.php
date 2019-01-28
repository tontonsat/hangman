<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] .'/hangman/app/config/appConfig.php');
require_once($_SERVER['DOCUMENT_ROOT'] .'/hangman/app/src/model/modules/game/Game.class.php');



if(!empty($_GET['init'])) {
    initGame();
}

function initGame() {
    $word = new WordDAO();
    $randWord = $word->getRandomWord();
    $_SESSION['word'] = $randWord;
    $data[] = ['word'=>$randWord];

    var_dump($data);
}

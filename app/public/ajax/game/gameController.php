<?php

session_start();

require_once($_SERVER['DOCUMENT_ROOT'] .'/hangman/app/config/appConfig.php');
require_once($_SERVER['DOCUMENT_ROOT'] .'/hangman/app/src/model/modules/game/Game.class.php');

$game = new Game();

if(!empty($_GET['init'])) {
    $word = $game->generateWord();
    $data['word'] = $word->getName();
    $data['wordCount'] = $word->getlength();
    echo json_encode($data);
}

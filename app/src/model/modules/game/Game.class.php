<?php

require_once($_SERVER['DOCUMENT_ROOT'] .'/hangman/app/src/model/modules/word/WordDAO.class.php');

class Game {

    /*
     * The constructor use the function hydrate, extends with Entity
     *
     */
    private $_randWord;
    private $_wordhandle;

    public function __construct() {
        $this->_wordHandle = new WordDAO();
        $this->_randWord = $this->_wordHandle->getRandomWord();
    }

    public function generateWord() {
        $_SESSION['word'] = $this->_randWord;
        $data = $this->_randWord;
        return $data;
    }

}

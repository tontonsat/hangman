<?php

require_once($_SERVER['DOCUMENT_ROOT'] .'/hangman/app/core/Entity.class.php');

class Word extends Entity {

    private $_idWord;
    private $_nameWord;
    private $_lengthWord;

    /*
     * The constructor use the function hydrate, extends with Entity
     *
     */

    public function __construct($data) {
        parent::hydrate(get_class($this), $data);
    }

    public function getId() {
        return $this->_idWord;
    }

    function getName() {
        return $this->_nameWord;
    }

    function getlength() {
        return $this->_lengthWord;
    }

    function setId($id) {
        $this->_idWord = $id;
    }

    function setName($name) {
        $this->_nameWord = $name;
    }

    function setLength($surnameUser) {
        $this->_wordLength = strlen($this->_nameWord);
    }
}

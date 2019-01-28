<?php

namespace App\Src\Model\Modules\Word;

use App\Core\Entity as Entity;
use App\Src\Model\Modules\Word\Dao;

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
        return $this->_idUser;
    }

    function getName() {
        return $this->_nameUser;
    }

    function getlength() {
        return $this->_surnameUser;
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

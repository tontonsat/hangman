<?php

require_once($_SERVER['DOCUMENT_ROOT'] .'/hangman/app/core/MySqlDao.class.php');
require_once($_SERVER['DOCUMENT_ROOT'] .'/hangman/app/src/model/modules/word/Word.class.php');

class GameDAO {

    private $_db;

    /** Constructor uses getInstance of Dao class **/
    public function __construct() {

        $this->_db = MySqlDao::getInstance();
    }

    /**
    * Simple method fetching runQuery result
    * runQuery is from MySqlDao class
    * @return array $result
    */
    public function getAll() {
        $sql = "SELECT * FROM word ORDER BY id_word";
        $tabWords = MySqlDao::runQuery($sql);
        foreach($tabWords->fetchAll() as $data){
            //var_dump($data);
            $result[] = new Word($data);
        }
        return $result;
    }

    public function getWordById($id) {
        $sql = "SELECT * FROM word WHERE id_word = $id";
        $tabWords = MySqlDao::runQuery($sql);
        $result = "";
        foreach($tabWords->fetchAll() as $data){
            $result = new Word($data);
        }
        if($result == "") {
            $errors[] = "Mot inexistant";
        }
        if(!empty($errors)) {
            $_SESSION['error'] = $errors;
            header("location: ?ctrl=Game&action=index");
            die();
        }
        return $result;
    }

    public function getRandomWord() {
        $sql = "SELECT * FROM word ORDER BY uuid()";
        $tabWords = MySqlDao::runQuery($sql);
        $data = $tabWords->fetchAll();
        $word = $data[array_rand($data, 1)];

        return new Word($word);
    }

}

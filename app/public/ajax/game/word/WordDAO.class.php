<?php

namespace App\Src\Model\Modules\Word;

use App\Core\MySqlDao as Db;
use App\Src\Model\Modules\Word\Word as Word;

class WordDAO {

    private $_db;

    /** Constructor uses getInstance of Dao class **/
    public function __construct() {

        $this->_db = Db::getInstance();
    }

    /**
    * Simple method fetching runQuery result
    * runQuery is from MySqlDao class
    * @return array $result
    */
    public function getAll() {
        $sql = "SELECT * FROM word ORDER BY id_word";
        $tabWords = Db::runQuery($sql);
        foreach($tabWords->fetchAll() as $data){
            //var_dump($data);
            $result[] = new Word($data);
        }
        return $result;
    }

    public function getWordById($id) {
        $sql = "SELECT * FROM word WHERE id_word = $id";
        $tabWords = Db::runQuery($sql);
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
        $sql = "SELECT * FROM word";
        $tabWords = Db::runQuery($sql);
        $result = "";
        foreach($tabWords->fetchAll() as $data){
            $words[] = new Word($data);
        }

        /** random number generation */
        $rand = rand(0,count($result));

        /** random word generation */
        $result = $words[$rand];

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

}

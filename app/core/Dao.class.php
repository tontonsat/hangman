<?php
/**
 * Description of Dao
 * Will define our db access
 * @author Stagiaire
 * uses variables declared in appConfig
 */
namespace App\Core;

use \PDO as PDO;

class Dao {

    private static $_instance;
    protected static $_db;

    protected function __construct() {
        self::setConnection(DB_USER,DB_PWD,DB_DSN);
    }

    private function __clone() {}

    private static function setConnection($user, $pwd, $dsn) {
       try {
           $options = array(
             PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'
           );
           self::$_db = new PDO($dsn, $user, $pwd, $options);
           self::$_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
       }
       catch (PDOException $e) {
           print "Erreur : " . $e->getMessage() . "<br />";
           die();
       }
    }
    /**
     * Static method returning pdo instance if set,
     * else creates instance & returns it.
     */
    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }
}

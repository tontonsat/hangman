<?php

require_once($_SERVER['DOCUMENT_ROOT'] .'/hangman/app/core/Dao.class.php');

class MySqlDao extends Dao {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Generic SQL query execute function
     * can take parameters, will return simple data to be fetched.
     */
    public static function runQuery($sql, $params = null) {
        try {
            if ($params == null) {
                $stmt = self::$_db->query($sql);
            }
            else {
                $stmt = self::$_db->prepare($sql);
                foreach ($params as $key => &$value) {
                    $stmt->bindParam(":".$key, $value);
                }
                $stmt->execute();
            }
            return $stmt;
        }
        catch (Exception $e) {
            print "Erreur : " . $e->getMessage() . "<br />";
            die();
        }
    }
}

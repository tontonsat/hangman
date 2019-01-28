<?php

namespace App;

define('DS', DIRECTORY_SEPARATOR);

class Autoloader {

    public static function register() {
        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    public static function autoload($class) {

        //on explose dans un tableau toutes les parties entre des antislashes
        //du nom qualifié de la classe à charger
        $nameSpace = explode('\\', $class);

        $classname = array_pop($nameSpace);
        //on met le nom du namespace tout en miniscule
        $nameSpace = array_map('strtolower', $nameSpace);
        array_push($nameSpace, $classname);

        //on rassemble les parties du tableau dans une chaine unique
        $class = implode(DS, $nameSpace);

        $file = $class . ".class.php";
        if(file_exists($file)){
            require_once $file;
        }
    }
}

<?php namespace App\Lib\Tools;

abstract class Tools {

    private static $defaultCtrl = "Front";
    private static $defaultMethod = "index";
    private static $controller;

    /**
    * This is a simple method allowing an organized
    * view of $data as var_export.
    */
    public static function dump($data){
        echo '<pre>' . var_export($data, true) . '</pre>';
    }

    public static function routerCtrl() {
        /**
        * checks & controls on $_GETS first
        */
        if(isset($_GET['ctrl'])) {
            $ctrlname = ucfirst(filter_var($_GET['ctrl'], FILTER_SANITIZE_STRING))."Controller";
        }
        else {
            $ctrlname = self::$defaultCtrl;
        }
        $ctrlname = CTRL_NS.$ctrlname;

        if(class_exists($ctrlname)) {
            self::$controller = new $ctrlname();
        }
        else {
            header("Location:404.php");
            die();
        }
        include VIEW_PATH."layout.php";
    }

    /**
    * Static method filtering and associating $get action to
    * a method of generated controller class.
    */
    public static function routerAction() {

        if(isset($_GET['action'])) {
            $method = filter_var($_GET['action'], FILTER_SANITIZE_STRING);
            if(method_exists(self::$controller, $method)) {
                if(isset($_GET['id'])) {
                    $result = self::$controller->$method(filter_var($_GET['id'], FILTER_SANITIZE_NUMBER_INT));
                }
                else {
                    $result = $controller->$method();
                }
            }
        }
        var_dump("sdsdsd");
        $result = (!isset($result)) ? self::$controller->self::$defaultMethod() : $result;
        return $result;
    }
}

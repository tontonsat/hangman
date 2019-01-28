<?php
namespace App\Src\Controller;

use App\Src\Model\Modules\Word\WordDAO as Word;

class FrontController {

    private $_word;


    public function __construct() {
        $this->_word = new Word();
    }

    /*
     * indexAction instance the first view in index.php
     */
    public function indexAction() {
        return $this->listDashboardAction();

    }

    public function listUserAction() {
        $users = $this->_user->getAll();

        return array(
            "view"  => VIEW_PATH."/front/user.php",
            "data"  => array(
                            "users" => $users,
            )
        );
    }
}

<?php
//require_once(realpath($_SERVER["DOCUMENT_ROOT"]) .'/app/src/model/modules/module/ModuleDAO.class.php');
//$modules = new ModuleDAO();
session_start();

if(!empty($_POST['reset']) && $_POST['reset'] == 1) {
    unset($_SESSION['modulesSession']);
    echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>Modules supprimés avec succès. <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button></div>";
}
if(!empty($_POST['delete']) && $_POST['delete'] == 1) {
    $key = $_POST['keyModule'];
    unset($_SESSION['modulesSession'][$key]);
    if(!empty($_SESSION['modulesSession'])) {
        $modules = $_SESSION['modulesSession'];
        require_once 'modulesForm.php';
    }
}
if(!empty($_POST['id_module']) && !empty($_POST['days_module'])) {
    $idModule = $_POST['id_module'];
    $daysModule = $_POST['days_module'];
    $nameModule = $_POST['name_module'];
    $_SESSION['modulesSession'][] = ['id_module' => $idModule, 'days_module' => $daysModule, 'name_module' => $nameModule];
}
if(!empty($_SESSION['modulesSession'])) {
    $modules = $_SESSION['modulesSession'];
    require_once 'modulesForm.php';
}

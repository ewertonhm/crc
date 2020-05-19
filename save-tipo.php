<?php
require_once 'config.php';
if(!\controller\User::checkPermission(2)){
    header('location:warning.php');
}

if(isset($_POST['action'])){
    $u = new Tipo();
    $u->setTipo($_POST['form1']);
    $u->save();
}

if(isset($_POST['edit'])){
    $u = TipoQuery::create()->findOneById((int)$_GET['id']);
    if(isset($_POST['form2']) AND $_POST['form2'] != NULL AND $_POST['form2'] != ''){
        $u->setTipo($_POST['form2']);
    }
    $u->save();
}

if(isset($_POST['delete'])){
    $u = TipoQuery::create()->findOneById((int)$_GET['id']);
    $u ->delete();
}















header('location:lista-tipos.php');
?>
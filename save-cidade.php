<?php
require_once 'config.php';
if(!\controller\User::checkPermission(2)){
    header('location:warning.php');
}

if(isset($_POST['action'])){
    $u = new Cidade();
    $u->setNome($_POST['form1']);
    $u->setEstadoId((int)$_POST['form2']);
    $u->save();
}

if(isset($_POST['edit'])){
    $u = CidadeQuery::create()->findOneById((int)$_GET['id']);
    if(isset($_POST['form2']) AND $_POST['form2'] != NULL AND $_POST['form2'] != ''){
        $u->setNome($_POST['form2']);
    }
    if(isset($_POST['form3']) AND $_POST['form3'] != NULL AND $_POST['form3'] != ''){
        $u->setEstadoId((int)$_POST['form3']);
    }
    $u->save();
}

if(isset($_POST['delete'])){
    $u = CidadeQuery::create()->findOneById((int)$_GET['id']);
    $u ->delete();
}















header('location:lista-cidades.php');
?>
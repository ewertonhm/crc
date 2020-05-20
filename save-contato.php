<?php
require_once 'config.php';
if(!\controller\User::checkPermission(2)){
    header('location:warning.php');
}

if(isset($_POST['action'])){
    $u = new Contato();
    $u->setContato($_POST['form1']);
    $u->save();
}

if(isset($_POST['edit'])){
    $u = ContatoQuery::create()->findOneById((int)$_GET['id']);
    if(isset($_POST['form2']) AND $_POST['form2'] != NULL AND $_POST['form2'] != ''){
        $u->setContato($_POST['form2']);
    }
    if(!isset($_POST['enable'])){
        $u->setDesabilitado(1);
    } else {
        $u->setDesabilitado(0);
    }
    $u->save();
}

if(isset($_POST['delete'])){
    $u = ContatoQuery::create()->findOneById((int)$_GET['id']);
    $u ->delete();
}















header('location:lista-contatos.php');
?>
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
    if(isset($_POST['nome']) AND $_POST['nome'] != NULL AND $_POST['nome'] != ''){
        $u->setNome($_POST['nome']);
    }
    if(isset($_POST['login']) AND $_POST['login'] != NULL AND $_POST['login'] != ''){
        $u->setLogin($_POST['login']);
    }
    if(isset($_POST['senha']) AND $_POST['senha'] != NULL AND $_POST['senha'] != ''){
        $u->setSenha(md5($_POST['senha']));
    }
    if(isset($_POST['permissao']) AND $_POST['permissao'] != NULL AND $_POST['permissao'] != ''){
        $u->setPermissao((int)$_POST['permissao']);
    }
    $u->save();
}

if(isset($_POST['delete'])){
    $u = TipoQuery::create()->findOneById((int)$_GET['id']);
    $u ->delete();
}















header('location:lista-tipos.php');
?>
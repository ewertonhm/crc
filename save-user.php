<?php
require_once 'config.php';
if(!\controller\User::checkPermission(2)){
    header('location:warning.php');
}

if(isset($_POST['action'])){
    $u = new Atendente();
    $u->setNome($_POST['nome']);
    $u->setLogin($_POST['login']);
    $u->setSenha(md5($_POST['senha']));
    $u->setPermissao((int)$_POST['permissao']);
    $u->save();
}

if(isset($_POST['edit'])){
    $u = AtendenteQuery::create()->findOneById((int)$_GET['id']);
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
    if(!isset($_POST['enable'])){
        $u->setDesabilitado(1);
    } else {
        $u->setDesabilitado(0);
    }
    $u->save();
}

if(isset($_POST['delete'])){
    $u = AtendenteQuery::create()->findOneById((int)$_GET['id']);
    $u ->delete();
}















header('location:lista-usuarios.php');
?>
<?php


namespace controller;


use AtendenteQuery;

class User
{
    public static function logar($login,$senha)
    {
        $usuario = AtendenteQuery::create()->findOneByLogin($login);
        if ($usuario != NULL) {
            if ($usuario->getLogin() == $login AND $usuario->getSenha() == md5($senha)) {
                if (!isset($_SESSION)) { session_start(); }
                $_SESSION['logado'] = true;
                $_SESSION['id'] = $usuario->getId();
                $_SESSION['permissao'] = $usuario->getPermissao();
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    public static function checkLogado()
    {
        if (!isset($_SESSION)) { session_start(); }
        if(isset($_SESSION['logado'])){
            return true;
        } else {
            return false;
        }
    }
    public static function checkPermission($permission)
    {
        if (!isset($_SESSION)) { session_start(); }
        if(User::checkLogado()){
            if($_SESSION['permissao'] >= $permission){
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
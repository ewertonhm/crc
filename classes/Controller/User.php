<?php

namespace controller;


use AtendenteQuery;

class User
{
    public static function logar($login,$senha)
    {
        $usuario = AtendenteQuery::create()->findOneByLogin($login);
        if ($usuario != NULL) {
            if($usuario->getTentativas() < 3){
                if ($usuario->getLogin() == $login AND $usuario->getSenha() == md5($senha) AND $usuario->getDesabilitado() != 1) {
                    if (!isset($_SESSION)) { session_start(); }
                    $_SESSION['logado'] = true;
                    $_SESSION['id'] = $usuario->getId();
                    $_SESSION['permissao'] = $usuario->getPermissao();
                    $usuario->setTentativas(0);
                    $usuario->save();
                    return true;
                } else {
                    $usuario->setTentativas($usuario->getTentativas()+1);
                    if($usuario->getTentativas() >= 0){
                        $usuario->setDesabilitado(1);
                    }
                    $usuario->save();
                    return false;
                }
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
    public static function cleanLoginErrorCounter($id){
        $usuario = AtendenteQuery::create()->findOneById($id);
        $usuario->setTentativas(0);
        $usuario->save();
        return true;
    }
}
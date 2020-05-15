<?php
require_once 'config.php';

$u = new \controller\User();
$u->logar('suporte.ewerton@toque.com.br','m2ghtep0st');

$teste = $u->checkPermission(2);
var_dump($teste);



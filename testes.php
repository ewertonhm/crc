<?php
require_once 'config.php';

$tipos = TipoQuery::create()->findOneByTipo('AAAA');

var_dump($tipos);
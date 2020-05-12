<?php
require_once 'config.php';

$tipos = TipoQuery::create()->find();

$formManager = new \controller\Form();

$formManager->selectForm($tipos,'getTipo');
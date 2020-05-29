<?php
require_once 'config.php';

$graficos = new \controller\Grafico();

echo "<pre>";
$graficos->chartScript('teste',TipoQuery::create()->find(),'getTipo','filterByTipo','%05/2020');
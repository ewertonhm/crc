<?php

require_once "config.php";

$cidade = new CidadeQuery();
$q = $cidade->findPk(1);

echo "<pre>";
echo $q->getNome();
<?php

require "vendor/autoload.php";

$cidade = \App\App\CidadeQuery::create()->findByNome('União da Vitória');
echo "<pre>";
var_dump($cidade);
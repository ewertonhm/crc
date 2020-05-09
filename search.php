<?php
require_once 'config.php';

$query = TipoQuery::create()->find();

$skillData = $query->toJSON();


var_dump($skillData);

// Return results as json encoded array
echo $skillData;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRC - Dashboard</title>
    <link rel="icon" href="img/footerfinal.png" sizes="16x16 32x32" type="image/png">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="css/materialize/materialize.min.css">

</head>


<div class="row">
    <div class="col s6">
        <canvas id="teste" width="400" height="400"></canvas>
    </div>
</div>


<!-- jQuery first, then Popper.js, then Bootstrap JS, then Materialize -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>



<?php
require_once 'config.php';

$g = new \controller\Grafico();


$g->GraficoTodos(CidadeQuery::create()->find(),'getNome','FilterByCidade',0,'teste');
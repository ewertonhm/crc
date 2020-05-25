<?php
require_once 'config.php';

$dompdf = new \Dompdf\Dompdf();

$html = file_get_contents('dashboard.php');

$dompdf->loadHtml($html);

$dompdf->setPaper('A4', 'landscape');

$dompdf->render();

$dompdf->stream();

//$g->GraficoTodos(ContratoQuery::create()->find(),'getContrato','FilterByContrato',0,'teste','Atendimentos por Contrato');
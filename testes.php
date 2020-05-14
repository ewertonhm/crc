<?php
require_once 'config.php';

$graficos = new \controller\Grafico();



$teste = $graficos->getTotalAtendimentosPorClasseMes(SolicitacaoQuery::create()->find(),'getSolicitacao','FilterBySolicitacao',0);

echo $teste['nome'][3];
echo $teste['quantidade'][3];



?>


<canvas id="atendimentos_numero" width="400px" height="400px"></canvas>



<!-- jQuery first, then Popper.js, then Bootstrap JS, then Materialize -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>


<script>
    $(document).ready(function(){
        $('.sidenav').sidenav();
    });
    $(".dropdown-trigger").dropdown();

</script>

<?php
$graficos->GraficoNumeroDeAtendimentos(12,'atendimentos_numero');

?>
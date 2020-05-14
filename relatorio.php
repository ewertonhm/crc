<?php

// https://www.chartjs.org/docs/latest/charts/doughnut.html
session_start();

if((!isset ($_SESSION['logado']) == true) and (!isset ($_SESSION['id']) == true)){
    unset($_SESSION['logado']);
    unset($_SESSION['id']);
    header('location:index.php');
} elseif ($_SESSION['permissao'] < 2){
    header('location:warning.php');
}


require_once 'config.php';



// total de atendimentos
$atendimentos = AtendimentoQuery::create()->find();

// total de atendimentos por mês dos ultimos 6 meses
$atendimentosAtual = AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->find();
$atendimentosMenos1 = AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(1)->toDateTimeString())->isoFormat('%MM/YYYY'))->find();
$atendimentosMenos2 = AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(2)->toDateTimeString())->isoFormat('%MM/YYYY'))->find();
$atendimentosMenos3 = AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(3)->toDateTimeString())->isoFormat('%MM/YYYY'))->find();
$atendimentosMenos4 = AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(3)->toDateTimeString())->isoFormat('%MM/YYYY'))->find();
$atendimentosMenos5 = AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(3)->toDateTimeString())->isoFormat('%MM/YYYY'))->find();

// Total de atendimentos por tipo do ultimo mês
// id do tipo = número do array +1
$qtipos = [];
$tipoTipos = [];
$tipos = TipoQuery::create()->find();
foreach ($tipos as $tipo){
    $tipoTipos[] = $tipo->getTipo();
    $qtipos[] = count(\Base\AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->filterByTipo($tipo)->find());
}

// Total de Atendimentos por  Cidade no último mês
$qcidades = [];
$nomeCidades = [];
$cidades = CidadeQuery::create()->find();
foreach ($cidades as $cidade){
    $nomeCidades[] = $cidade->getNome();
    $qcidades[] = count(AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->filterByCidade($cidade)->find());
}

// Total de Atendimentos por Contato no último mês
$qcontato = [];
$contatoContato = [];
$contatos = ContatoQuery::create()->find();
foreach ($contatos as $contato){
    $contatoContato[] = $contato->getContato();
    $qcontato[] = count(AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->filterByContato($contato)->find());
}

// Total de Atendimentos por Solicitação
$qsolicitacao = [];
$solicitacaoSolicitacao = [];
$solicitacoes = SolicitacaoQuery::create()->find();
foreach ($solicitacoes as $solicitacao){
    $solicitacaoSolicitacao[] = $solicitacao->getSolicitacao();
    $qsolicitacao[] = count(AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->filterBySolicitacao($solicitacao)->find());
}

// Total de Atendimentos por Motivo
$qmotivo = [];
$motimoMotivo = [];
$motivos = MotivoQuery::create()->find();
foreach ($motivos as $motivo){
    $motimoMotivo[] = $motivo->getMotivo();
    $qmotivo[] = count(AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->filterByMotivo($motivo)->find());
}
// Total de Atendimentos por Contrato
$qcontrato = [];
$contratoContrato = [];
$contratos = ContratoQuery::create()->find();
foreach ($contratos as $contrato){
    $contratoContrato[] = $contrato->getContrato();
    $qcontrato[] = count(AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->filterByContrato($contrato)->find());
}
// Total de Atendimentos por Agendamento
$qagendamento = [];
$agendamentoAgendamento = [];
$agendamentos = AgendamentoQuery::create()->find();
foreach ($agendamentos as $agendamento){
    $agendamentoAgendamento[] = $agendamento->getAgendamento();
    $qagendamento[] = count(AtendimentoQuery::create()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->filterByAgendamento($agendamento)->find());
}
// Média de Atendimentos por horário no Mês
$qhoraio = [];
$horarioHorario = [];
//


?>


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
<body>
<!-- Dropdown Structure -->
<nav>
    <div class="nav-wrapper black">
        <a href="#!" class="brand-logo"><img src="img/footerfinal.png" width="45" height="45" class="d-inline-block center"></a>
    </div>
</nav>
<div class="row">
    <p>Total de atendimentos: <?php echo count($atendimentos); ?></p>
    <p>Total de atendimentos no mês: <?php echo count($atendimentosAtual); ?></p>
    <?php
    echo "<br>";

    $counterTipo = 0;
    foreach ($tipoTipos as $t){
        echo "<p>Total de atendimentos no mês do tipo ".$t.": ".$qtipos[$counterTipo]."</p>";
        $counterTipo++;
    }
    echo "<br>";
    $counterCidade = 0;
    foreach ($nomeCidades as $c){
        echo "<p>Total de atendimentos no mês para a cidade ".$c.": ".$qcidades[$counterCidade]."</p>";
        $counterCidade++;
    }
    echo "<br>";
    $counterContato = 0;
    foreach ($contatoContato as $c){
        echo "<p>Total de atendimentos no mês para o contato ".$c.": ".$qcontato[$counterContato]."</p>";
        $counterContato++;
    }
    echo "<br>";
    $counterSolicitacao = 0;
    foreach ($solicitacaoSolicitacao as $s){
        echo "<p>Total de atendimentos no mês para a solicitação ".$s.": ".$qsolicitacao[$counterSolicitacao]."</p>";
        $counterSolicitacao++;
    }
    echo "<br>";
    $counterMotivo = 0;
    foreach ($motimoMotivo as $m){
        echo "<p>Total de atendimentos no mês para o motivo ".$m.": ".$qmotivo[$counterMotivo]."</p>";
        $counterMotivo++;
    }
    echo "<br>";
    $counterContrato = 0;
    foreach ($contratoContrato as $c){
        echo "<p>Total de atendimentos no mês para o contrato ".$c.": ".$qcontrato[$counterContrato]."</p>";
        $counterContrato++;
    }
    echo "<br>";
    $counterAgendamento = 0;
    foreach ($agendamentoAgendamento as $a){
        echo "<p>Total de atendimentos no mês para o agendamento ".$a.": ".$qagendamento[$counterAgendamento]."</p>";
        $counterAgendamento++;
    }

    ?>
</div>
<div class="row">
    <div class="col s6">
        <canvas id="atendimentos_numero" width="400" height="400"></canvas>
    </div>
</div>


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
<script>
    var ctx = document.getElementById('atendimentos_numero');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [
                <?php
                echo "'";
                echo \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(5)->toDateTimeString())->isoFormat('MMM/Y');
                echo "','";
                echo \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(4)->toDateTimeString())->isoFormat('MMM/Y');
                echo "','";
                echo \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(3)->toDateTimeString())->isoFormat('MMM/Y');
                echo "','";
                echo \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(2)->toDateTimeString())->isoFormat('MMM/Y');
                echo "','";
                echo \Carbon\Carbon::parse(\Carbon\Carbon::now()->subMonth(1)->toDateTimeString())->isoFormat('MMM/Y');
                echo "','";
                echo \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('MMM');
                echo "'";
                ?>
            ],
            datasets: [{
                label: 'número de atendimentos',
                data: [
                    <?php
                    echo count($atendimentosMenos5);
                    echo ",";
                    echo count($atendimentosMenos4);
                    echo ",";
                    echo count($atendimentosMenos3);
                    echo ",";
                    echo count($atendimentosMenos2);
                    echo ",";
                    echo count($atendimentosMenos1);
                    echo ",";
                    echo count($atendimentosAtual);
                    ?>
                ],
                backgroundColor: [
                    'rgba(63, 191, 63, 0.2)',
                    'rgba(63, 191, 191, 0.2)',
                    'rgba(63, 191, 63, 0.2)',
                    'rgba(63, 191, 191, 0.2)',
                    'rgba(63, 191, 63, 0.2)',
                    'rgba(63, 191, 191, 0.2)'
                ],
                borderColor: [
                    'rgba(63, 191, 63, 1)',
                    'rgba(63, 191, 191, 1)',
                    'rgba(63, 191, 63, 1)',
                    'rgba(63, 191, 191, 1)',
                    'rgba(63, 191, 63, 1)',
                    'rgba(63, 191, 191, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
</script>

</body>


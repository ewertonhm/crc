<?php
// TODO: Setar Filtro de Período para os gráficos
// TODO: Gráfico Tipo atendimento
// TODO: Gráfico Solicitação
// TODO: Gráfico Motivo
// TODO: Gráfico Contato
// TODO: Gráfico Cidade
// TODO: Gráfico Contrato
// TODO: Gráfico Solicitação
// TODO: Gráfico Agendamento
// TODO: Maior tipo de atendimento por horário
// TODO: Média de atendimentos por hora

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
    // Pessoa Fisica
    

    // Pessoa Jurídica

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
<ul id="dropdown1" class="dropdown-content">
    <li><a href="#!">Tipo de Cliente</a></li>
    <li><a href="#!">Bairro</a></li>
    <li><a href="#!">Cidade</a></li>
    <li><a href="#!">Estado</a></li>
    <li><a href="#!">Contato</a></li>
    <li><a href="#!">Solicitação</a></li>
    <li><a href="#!">Motivo</a></li>
    <li><a href="#!">Contrato</a></li>
    <li><a href="#!">Agendamento</a></li>
</ul>
<nav>
    <div class="nav-wrapper black">
        <a href="#!" class="brand-logo"><img src="img/footerfinal.png" width="45" height="45" class="d-inline-block center"></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="lista.php">Lista Inserção</a></li>
            <li><a href="conf-lista.php">Lista Consulta</a></li>
            <li><a href="config.php">Usuários</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dados Tabela<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>
<div class="row">
    <p>Total de atendimentos: <?php echo count($atendimentos); ?></p>
    <p>Total de atendimentos no mês: <?php echo count($atendimentosAtual); ?></p>
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
</html>
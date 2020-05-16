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

    require_once 'config.php';

    if(!\controller\User::checkPermission(2)){
        header('location:warning.php');
    }

    $grafico = new \controller\Grafico();

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
        <a href="index.php" class="brand-logo "><img src="img/footerfinal.png" width="45" height="45" class="d-inline-block valign-wrapper"></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="relatorio.php">Relatório</a></li>
            <li><a href="lista.php">Lista Inserção</a></li>
            <li><a href="conf-lista.php">Lista Consulta</a></li>
            <li><a href="lista-usuarios.php">Usuários</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dados Tabela<i class="material-icons right">arrow_drop_down</i></a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </div>
</nav>

<div class="row">
</div>

<div class="row">
    <div class="col s8">
        <div class="card-panel">
            <canvas id="contato" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="col s4">
        <ul class="collapsible">
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">date_range</i>
                        Total de atendimentos:
                        <span class="badge"><?php echo AtendimentoQuery::create()->count();?></span></div>
                    <div class="collapsible-body"><p>Total de atendimentos: <?php echo AtendimentoQuery::create()->count();?></p></div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">today</i>
                        Atendimentos no mês:
                        <span class="badge"><?php echo $grafico->getTotalAtendimentosMesAnterior(0)?></p></span></div>
                    <div class="collapsible-body"><p>Atendimentos no mês: <?php echo $grafico->getTotalAtendimentosMesAnterior(0)?></p></div>
                </li>
            </ul>
        <div class="card-panel">
            <canvas id="tipo_cliente" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="col s2"></div>
</div>
<div class="row">
    <div class="col s8">
        <div class="card-panel">
            <canvas id="cidade" width="400" height="200"></canvas>
        </div>
    </div>
    <div class="col s4">
        <div class="card-panel">
            <canvas id="solicitacao" width="400" height="200"></canvas>
        </div>
        <div class="card-panel">
            <canvas id="agendamento" width="400" height="190"></canvas>
        </div>
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
<?php
$grafico->GraficoTodos(ContatoQuery::create()->find(),'getContato','filterByContato',0,'contato','Atendimentos por Plataforma','bar');
$grafico->GraficoTipoDeCliente(0,'tipo_cliente');
$grafico->GraficoTodos(CidadeQuery::create()->find(),'getNome','FilterByCidade',0,'cidade','Atendimentos por Cidade');
$grafico->GraficoTodos(SolicitacaoQuery::create()->find(),'getSolicitacao','filterBySolicitacao',0,'solicitacao','Atendimentos por Solicitação','bar');
$grafico->GraficoTodos(AgendamentoQuery::create()->find(),'getAgendamento','filterByAgendamento',0,'agendamento','Agendamentos','bar');

?>

</body>
</html>
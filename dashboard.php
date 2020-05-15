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
        <a href="#!" class="brand-logo"><img src="img/footerfinal.png" width="45" height="45" class="d-inline-block center"></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="relatorio.php">Relatório</a></li>
            <li><a href="lista.php">Lista Inserção</a></li>
            <li><a href="conf-lista.php">Lista Consulta</a></li>
            <li><a href="config.php">Usuários</a></li>
            <!-- Dropdown Trigger -->
            <li><a class="dropdown-trigger" href="#!" data-target="dropdown1">Dados Tabela<i class="material-icons right">arrow_drop_down</i></a></li>
        </ul>
    </div>
</nav>

<div class="row">
    <div class="col s3">
        <canvas id="atendimentos_numero" width="400" height="400"></canvas>
    </div>
    <div class="col s3">
        <canvas id="tipo_cliente" width="400" height="400"></canvas>
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
$grafico->GraficoNumeroDeAtendimentos(2,0,'atendimentos_numero');
$grafico->GraficoTipoDeCliente(0,'tipo_cliente');

?>

</body>
</html>
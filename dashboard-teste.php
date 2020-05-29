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
    <link rel="stylesheet" href="css/materialize/materialize.min.css" >

    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body>
<!-- Dropdown Structure -->
<ul id="dropdown1" class="dropdown-content">
    <li><a href="lista-tipos.php">Tipo de Cliente</a></li>
    <li><a href="lista-bairros.php">Bairro</a></li>
    <li><a href="lista-cidades.php">Cidade</a></li>
    <li><a href="lista-estados.php">Estado</a></li>
    <li><a href="lista-contatos.php">Contato</a></li>
    <li><a href="lista-solicitacoes.php">Solicitação</a></li>
    <li><a href="lista-motivos.php">Motivo</a></li>
    <li><a href="lista-contratos.php">Contrato</a></li>
    <li><a href="lista-agendamentos.php">Agendamento</a></li>
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

<div class="container">

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

?>

</body>
</html>
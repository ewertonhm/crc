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
$periodo = '';
if(isset($_GET['periodo'])){
    $mes = substr($_GET['periodo'], -2);
    $ano = substr($_GET['periodo'], 0, -3);
    $periodoAno = "%/".$ano;
    $periodoMes = "%".$mes."/".$ano;
    $periodoValue = $_GET['periodo'];
} else {
    $periodo =  \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY');
    $periodoValue = \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('YYYY-MM');
}

$totalAtendimentos = AtendimentoQuery::create()->find()->count();
$anoAtendimentos = AtendimentoQuery::create()->where('atendimento.data like ?', $periodoAno)->find()->count();
$mesAtendimentos = AtendimentoQuery::create()->where('atendimento.data like ?', $periodoMes)->find()->count();

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>CRC - Dashboard - Relatório</title>
    <link rel="icon" href="img/footerfinal.png" sizes="16x16 32x32" type="image/png">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="css/materialize/materialize.min.css">
    <style type="text/css">
        @media print {
            .dont-break {
                page-break-inside:avoid;

            }
        }
    </style>

</head>
<body>

<div class="center-align">
    <div class="row">
        <div class="col s12 dont-break">
            <h4>Relatório do C.R.C</h4>
            <h6><?php echo $_GET['periodo'] ;?></h6>
        </div>
    </div>
    <div class="row">
        <div class="col s12 dont-break">
            <h5>Atendimentos totais</h5>
            <ul class="collapsible">
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">today</i>
                        Mês
                        <span class="badge"><?php echo $mesAtendimentos; ?></span>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">date_range</i>
                        Ano
                        <span class="badge"><?php echo $anoAtendimentos; ?></span>
                    </div>
                </li>
                <li>
                    <div class="collapsible-header">
                        <i class="material-icons">event_note</i>
                        Total
                        <span class="badge"><?php echo $totalAtendimentos; ?></span>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 dont-break">
            <h5>Atendimentos por tipo de cliente no mês</h5>
            <ul class="collapsible">
                <?php
                $as = TipoQuery::create()->find();
                foreach ($as as $a){
                    $icon = '';
                    if($a->getTipo() == 'Pessoa Física'){
                        $icon = 'person';
                    } else {
                        $icon = 'business';
                    }
                    echo "<li><div class='collapsible-header'><i class='material-icons'>".$icon."</i>";
                    echo $a->getTipo();
                    echo "<span class='badge'>";
                    echo AtendimentoQuery::create()->filterByTipo($a)->where('atendimento.data like ?', $periodoMes)->find()->count();
                    echo "</span></div></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 dont-break">
            <h4>Atendimentos por atendente no mês</h4>
            <ul class="collapsible">
                <?php
                $as = AtendenteQuery::create()->find();
                foreach ($as as $a){
                    $icon = 'account_box';

                    echo "<li><div class='collapsible-header'><i class='material-icons'>".$icon."</i>";
                    echo $a->getNome();
                    echo "<span class='badge'>";
                    echo AtendimentoQuery::create()->filterByAtendente($a)->where('atendimento.data like ?', $periodoMes)->find()->count();
                    echo "</span></div></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 dont-break">
            <h4>Atendimentos por cidade no mês</h4>
            <ul class="collapsible">
                <?php
                    $as = CidadeQuery::create()->find();
                    foreach ($as as $a){
                        echo "<li><div class='collapsible-header'><i class='material-icons'>location_city</i>";
                        echo $a->getNome();
                        echo "<span class='badge'>";
                        echo AtendimentoQuery::create()->filterByCidade($a)->where('atendimento.data like ?', $periodoMes)->find()->count();
                        echo "</span></div></li>";
                    }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 dont-break">
            <h4>Atendimentos por contato no mês</h4>
            <ul class="collapsible">
                <?php
                $as = ContatoQuery::create()->find();
                foreach ($as as $a){
                    $icon = '';
                    if($a->getContato() == 'Telefone'){
                        $icon = 'contact_phone';
                    } elseif ($a->getContato() == 'Whatsapp' OR $a->getContato() == 'Facebook') {
                        $icon = 'contact_mail';
                    }elseif ($a->getContato() == 'Email'){
                        $icon = 'contact_mail';
                    } else {
                        $icon = 'contacts';
                    }
                    echo "<li><div class='collapsible-header'><i class='material-icons'>".$icon."</i>";
                    echo $a->getContato();
                    echo "<span class='badge'>";
                    echo AtendimentoQuery::create()->filterByContato($a)->where('atendimento.data like ?', $periodoMes)->find()->count();
                    echo "</span></div></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 dont-break">
            <h4>Atendimentos por solicitação no mês</h4>
            <ul class="collapsible">
                <?php
                $as = SolicitacaoQuery::create()->find();
                foreach ($as as $a){
                    $icon = '';
                    if($a->getSolicitacao() == 'Telefone'){
                        $icon = 'contact_phone';
                    } elseif ($a->getSolicitacao() == 'Whatsapp' OR $a->getSolicitacao() == 'Facebook') {
                        $icon = 'contact_mail';
                    }elseif ($a->getSolicitacao() == 'Email'){
                        $icon = 'contact_mail';
                    } else {
                        $icon = 'assignment';
                    }
                    echo "<li><div class='collapsible-header'><i class='material-icons'>".$icon."</i>";
                    echo $a->getSolicitacao();
                    echo "<span class='badge'>";
                    echo AtendimentoQuery::create()->filterBySolicitacao($a)->where('atendimento.data like ?', $periodoMes)->find()->count();
                    echo "</span></div></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 dont-break">
            <h4>Atendimentos por motivo no mês</h4>
            <ul class="collapsible">
                <?php
                $as = MotivoQuery::create()->find();
                foreach ($as as $a){
                    $icon = '';
                    if($a->getMotivo() == 'Telefone'){
                        $icon = 'contact_phone';
                    } elseif ($a->getMotivo() == 'Whatsapp' OR $a->getMotivo() == 'Facebook') {
                        $icon = 'contact_mail';
                    }elseif ($a->getMotivo() == 'Email'){
                        $icon = 'contact_mail';
                    } else {
                        $icon = 'live_help';
                    }
                    echo "<li><div class='collapsible-header'><i class='material-icons'>".$icon."</i>";
                    echo $a->getMotivo();
                    echo "<span class='badge'>";
                    echo AtendimentoQuery::create()->filterByMotivo($a)->where('atendimento.data like ?', $periodoMes)->find()->count();
                    echo "</span></div></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 dont-break">
            <h4>Atendimentos por contrato no mês</h4>
            <ul class="collapsible">
                <?php
                $as = ContratoQuery::create()->find();
                foreach ($as as $a){
                    $icon = 'network_wifi';
                    echo "<li><div class='collapsible-header'><i class='material-icons'>".$icon."</i>";
                    echo $a->getContrato();
                    echo "<span class='badge'>";
                    echo AtendimentoQuery::create()->filterByContrato($a)->where('atendimento.data like ?', $periodoMes)->find()->count();
                    echo "</span></div></li>";
                }
                ?>
            </ul>
        </div>
    </div>
    <div class="row">
        <div class="col s12 dont-break">
            <h4>Atendimentos por agendamento no mês</h4>
            <ul class="collapsible">
                <?php
                $as = AgendamentoQuery::create()->find();
                foreach ($as as $a){
                    $icon = 'assignment_turned_in';
                    echo "<li><div class='collapsible-header'><i class='material-icons'>".$icon."</i>";
                    echo $a->getAgendamento();
                    echo "<span class='badge'>";
                    echo AtendimentoQuery::create()->filterByAgendamento($a)->where('atendimento.data like ?', $periodoMes)->find()->count();
                    echo "</span></div></li>";
                }
                ?>
            </ul>
        </div>
    </div>

</div>

<!-- jQuery first, then Popper.js, then Bootstrap JS, then Materialize
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
-->
</body>
</html>
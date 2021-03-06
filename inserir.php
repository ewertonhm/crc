<?php
// TODO Opção de menu dropdown e autocompletar para cada campo (nas configurações do usuário)
    require_once 'config.php';
    if(!\controller\User::checkPermission(0)){
        header('location:warning.php');
    }
?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="css/materialize/materialize.min.css">
    <link rel="stylesheet" href="css/materialize/form.css">

    <title>Planilha do C.R.C - Inserir</title>
    <?php
    unset($_POST);
    $tipos = TipoQuery::create()->orderByTipo()->find();
    $bairros = BairroQuery::create()->orderByNome()->find();
    $cidades = CidadeQuery::create()->orderByNome()->find();
    $estados = EstadoQuery::create()->find();
    $contatos = ContatoQuery::create()->orderByContato('desc')->find();
    $solicitacaos = SolicitacaoQuery::create()->orderBySolicitacao('desc')->find();
    $motivos = MotivoQuery::create()->orderByMotivo()->find();
    $contratos = ContratoQuery::create()->orderById()->find();
    $agendamentos = AgendamentoQuery::create()->orderByAgendamento()->find();


    $now = \Carbon\Carbon::now()->toDateTimeString();
    $carbon = \Carbon\Carbon::parse($now);

    $date = $carbon->isoFormat('D/MM/YYYY');
    $time = $carbon->isoFormat('HH:00');


    $atendente = AtendenteQuery::create()->findOneById($_SESSION['id'])->getNome();

    $formManager = new \controller\Form();

    ?>

</head>
<body>

<div class="row">
    <form autocomplete="off" name="form1" class="col s12" action="save.php" method="post">
        <div class="col s12">
            <div class="row ">
                <h3 class="green-text">Inserção</h3>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input disabled type="text" id="autocomplete-input" name="data" class="data" value=<?php echo $date;?>>
                    <label for="autocomplete-input">Data</label>
                </div>
                <div class="input-field col s1">
                    <input type="text" id="autocomplete-input" name="hora" class="hora" value=<?php echo $time;?>>
                    <label for="autocomplete-input">Hora</label>
                </div>
                <div class="input-field col s3">
                    <input disabled type="text" id="autocomplete-input" name="atendente" class="atendente" value=<?php echo $atendente;?>>
                    <label for="autocomplete-input">Atendente</label>
                </div>
                <div class="input-field col s3">
                    <input autofocus required type="text" name="cadastro" class="cadastro">
                    <label for="autocomplete-input">Cadastro</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s5">
                    <input type="text" required id="autocomplete-input" name="cliente" class="cliente">
                    <label for="autocomplete-input">Cliente</label>
                </div>
                <div class="input-field col s2">
                    <?php $formManager->selectForm($tipos,'getTipo','tipo') ?>
                    <label for="autocomplete-input">Tipo de Cliente</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" required id="autocomplete-input" name="telefone" class="telefone">
                    <label for="autocomplete-input">Telefone</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" required id="autocomplete-input" name="cidade" class="cidade">
                    <label for="autocomplete-input">Cidade</label>
                </div>
                <!-- campo estado, removido para alterar o mesmo para preenchimento no backend
                <div class="input-field col s1">
                    <input type="text" id="autocomplete-input" name="uf" class="uf">
                    <label for="autocomplete-input">UF</label>
                </div>
                -->
                <div class="input-field col s2">
                    <input type="text" required id="autocomplete-input" name="bairro" class="bairro">
                    <label for="autocomplete-input">Bairro</label>
                </div>
                <div class="input-field col s2">
                    <?php $formManager->selectForm($contatos,'getContato','contato') ?>
                    <label for="autocomplete-input">Contato</label>
                </div>
                <div class="input-field col s2">
                    <?php $formManager->selectForm($solicitacaos,'getSolicitacao','solicitacao') ?>
                    <label for="autocomplete-input">Solicitação</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <?php $formManager->selectForm($motivos,'getMotivo','motivo') ?>
                    <label for="autocomplete-input">Motivo</label>
                </div>
                <div class="input-field col s4">
                    <?php $formManager->selectForm($contratos,'getContrato','contrato') ?>
                    <label for="autocomplete-input">Contrato</label>
                </div>
                <div class="input-field col s2">
                    <?php $formManager->selectForm($agendamentos,'getAgendamento','agendamento') ?>
                    <label for="autocomplete-input">Agendamento</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s8">

                </div>
                <div class="input-field col s1">
                    <button class="btn waves-effect waves-light green" type="submit" name="action">Salvar
                        <i class="material-icons right">send</i>
                    </button>
                </div>

            </div>
    </form>
</div>



<!-- Compiled and minified JavaScript -->
<script src="js/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>






<script type='text/javascript'>

    $(document).ready(function(){
        $('select').formSelect();
    });

    // Desativa o salvar com Enter
    $(document).ready(function() {
        $(window).keydown(function(event){
            if(event.keyCode == 13) {
                event.preventDefault();
                return false;
            }
        });
    });


    // Auto Complete do bairro
    $(document).ready(function(){
        $('input.bairro').autocomplete({
            data: {
                <?php $formManager->autocompleteForm($bairros,'getNome');?>
            },
        });
    });

    // Auto Complete da cidade
    $(document).ready(function(){
        $('input.cidade').autocomplete({
            data: {
                <?php $formManager->autocompleteForm($cidades,'getNome');?>
            },
        });
    });

    // Auto complete UF
    /* removido */

</script>
</body>
</html>

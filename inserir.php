<?php
    session_start();
    if((!isset ($_SESSION['logado']) == true) and (!isset ($_SESSION['id']) == true)){
        var_dump($_SESSION['logado']);
        var_dump($_SESSION['id']);
        unset($_SESSION['logado']);
        unset($_SESSION['id']);
        header('location:index.php');
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
    require_once 'config.php';
    $tipos = TipoQuery::create()->orderByTipo()->find();
    $bairros = BairroQuery::create()->orderByNome()->find();
    $cidades = CidadeQuery::create()->orderByNome()->find();
    $estados = EstadoQuery::create()->find();
    $contatos = ContatoQuery::create()->orderByContato()->find();
    $solicitacaos = SolicitacaoQuery::create()->orderBySolicitacao()->find();
    $motivos = MotivoQuery::create()->orderByMotivo()->find();
    $contratos = ContratoQuery::create()->orderByContrato()->find();
    $agendamentos = AgendamentoQuery::create()->orderByAgendamento()->find();
    ?>

</head>
<body>

<div class="row">
    <form class="col s12" action="save.php" method="post">
        <div class="col s12">
            <div class="row ">
                <h3 class="green-text">Inserção</h3>
            </div>
            <div class="row">
                <div class="input-field col s1">
                    <input type="text" id="autocomplete-input" class="data green-text">
                    <label for="autocomplete-input">Data</label>
                </div>
                <div class="input-field col s1">
                    <input type="text" id="autocomplete-input" class="hora">
                    <label for="autocomplete-input">Hora</label>
                </div>
                <div class="input-field col s1">
                    <input type="text" id="autocomplete-input" class="cadastro">
                    <label for="autocomplete-input">Cadastro</label>
                </div>
                <div class="input-field col s4">
                    <input type="text" id="autocomplete-input" class="cliente">
                    <label for="autocomplete-input">Cliente</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" id="autocomplete-input" class="tipo">
                    <label for="autocomplete-input">Tipo de Cliente</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" id="autocomplete-input" class="bairro">
                    <label for="autocomplete-input">Bairro</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" id="autocomplete-input" class="cidade">
                    <label for="autocomplete-input">Cidade</label>
                </div>
                <div class="input-field col s1">
                    <input type="text" id="autocomplete-input" class="uf">
                    <label for="autocomplete-input">UF</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" id="autocomplete-input" class="contato">
                    <label for="autocomplete-input">Contato</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" id="autocomplete-input" class="solicitação">
                    <label for="autocomplete-input">Solicitação</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s2">
                    <input type="text" id="autocomplete-input" class="motivo">
                    <label for="autocomplete-input">Motivo</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" id="autocomplete-input" class="Contrato">
                    <label for="autocomplete-input">Contrato</label>
                </div>
                <div class="input-field col s1">
                    <input type="text" id="autocomplete-input" class="agendamento">
                    <label for="autocomplete-input">Agendamento</label>
                </div>
                <div class="input-field col s1">
                    <input type="text" id="autocomplete-input" class="atendente">
                    <label for="autocomplete-input">Atendente</label>
                </div>
                <div class="input-field col s2">
                    <input type="text" id="autocomplete-input" class="telefone">
                    <label for="autocomplete-input">Telefone</label>
                </div>
            </div>
            <div class="row">
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
        $('input.tipo').autocomplete({
            data: {
                <?php
                $quantidadeTipos = count($tipos);
                $contadorTipos = 0;
                foreach ($tipos as $tipo) {
                    echo "\"".$tipo->getTipo()."\": null";
                    if($quantidadeTipos != $contadorTipos){
                        echo ",";
                        $contadorTipos++;
                    }
                }
                ?>
            },
        });
    });
    $(document).ready(function(){
        $('input.bairro').autocomplete({
            data: {
                <?php
                $quantidadeBairros = count($bairros);
                $contadorBairros = 0;
                foreach ($bairros as $bairro) {
                    echo "\"".$bairro->getNome()."\": null";
                    if($quantidadeBairros != $contadorBairros){
                        echo ",";
                        $contadorBairros++;
                    }
                }
                ?>
            },
        });
    });

</script>
</body>
</html>

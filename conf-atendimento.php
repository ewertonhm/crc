<?php
    require_once 'config.php';
    if(!\controller\User::checkPermission(1)){
        header('location:warning.php');
    }
    require_once 'config.php';
    $dados = AtendimentoQuery::create()->findOneById((int)$_GET['id']);
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

    <title>Planilha do C.R.C - Pós Atendimento</title>
</head>
<body>

<div class="row">
    <form autocomplete="off" name="form1" class="col s12" action="save.php?id=<?php echo $dados->getId();?>" method="post">
        <div class="col s12">
            <div class="row ">
                <h3 class="green-text">Pós Atendimento</h3>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input  type="text" name="form1" class="nome" value="<?php echo $dados->getId();?>" disabled>
                    <label for="autocomplete-input">ID</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getData();?>" disabled>
                    <label for="autocomplete-input">Data</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getHora();?>" disabled>
                    <label for="autocomplete-input">Hora</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getCadastro();?>" disabled>
                    <label for="autocomplete-input">Cadastro</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getCliente();?>" disabled>
                    <label for="autocomplete-input">Cliente</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getTipo()->getTipo();?>" disabled>
                    <label for="autocomplete-input">Tipo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getBairro()->getNome();?>" disabled>
                    <label for="autocomplete-input">Bairro</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getCidade()->getNome();?>" disabled>
                    <label for="autocomplete-input">Cidade</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getEstado()->getNome();?>" disabled>
                    <label for="autocomplete-input">Estado</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getContato()->getContato();?>" disabled>
                    <label for="autocomplete-input">Contato</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getSolicitacao()->getSolicitacao();?>" disabled>
                    <label for="autocomplete-input">Solicitação</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getMotivo()->getMotivo();?>" disabled>
                    <label for="autocomplete-input">Motivo</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getContrato()->getContrato();?>" disabled>
                    <label for="autocomplete-input">Contrato</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getAgendamento()->getAgendamento();?>" disabled>
                    <label for="autocomplete-input">Agendamento</label>
                </div>
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getAtendente()->getNome();?>" disabled>
                    <label for="autocomplete-input">Atendente</label>
                </div>
            </div>



            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getTelefone();?>" disabled>
                    <label for="autocomplete-input">Telefone</label>
                </div>
                <div class="input-field col s3">
                    <select name='form3'>
                        <?php
                            $tags = TagQuery::create()->find();
                            foreach ($tags as $tag){
                                echo "<option value ='".$tag->getId()."'";
                                if($dados->getTag() == $tag->getId()){
                                    echo "selected";
                                }
                                echo ">".$tag->getTag()."</option>";
                            }
                        ?>
                    </select>
                    <label for="autocomplete-input">Tag</label>
                </div>
                <div class="input-field col s3">
                    <label>
                        <input type="checkbox" name="enable" class="filled-in" <?php if($dados->getConferido() == 1){ echo "checked='checked'";}  ?>/>
                        <span>Conferido</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s9">
                    <textarea id="textarea2" class="materialize-textarea" name='obs' data-length="500"></textarea>
                    <label for="textarea2">Observações</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s1">
                    <button class="btn waves-effect waves-light green" type="submit" name="conferir">Salvar
                        <i class="material-icons right">send</i>
                    </button>
                </div>
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
    $(document).ready(function() {
        $('input#input_text, textarea#textarea2').characterCounter();
    });

</script>
</body>
</html>

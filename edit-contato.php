<?php
    require_once 'config.php';
    if(!\controller\User::checkPermission(2)){
        header('location:warning.php');
    }
    require_once 'config.php';
    $dados = ContatoQuery::create()->findOneById((int)$_GET['id']);
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

    <title>Planilha do C.R.C - Editar Contato</title>
</head>
<body>

<div class="row">
    <form autocomplete="off" name="form1" class="col s12" action="save-contato.php?id=<?php echo $dados->getId();?>" method="post">
        <div class="col s12">
            <div class="row ">
                <h3 class="green-text">Editar Contato</h3>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="form1" class="nome" value="<?php echo $dados->getId();?>" disabled>
                    <label for="autocomplete-input">ID</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="form2" class="nome" value="<?php echo $dados->getContato();?>">
                    <label for="autocomplete-input">Contato</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <label>
                        <input type="checkbox" name="enable" class="filled-in" <?php if($dados->getDesabilitado() != 1){ echo "checked='checked'";}  ?>/>
                        <span>Ativo</span>
                    </label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s1">
                    <button class="btn waves-effect waves-light green" type="submit" name="edit">Salvar
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

</script>
</body>
</html>

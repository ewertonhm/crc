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

    $atendente = AtendenteQuery::create()->findOneById($_SESSION['id'])->getNome();

    $formManager = new \controller\Form();

    ?>

</head>
<body>

<div class="row">
    <form autocomplete="off" class="col s12" action="save.php" method="post">
        <div class="col s12">
            <div class="row ">
                <h3 class="green-text">Configurações</h3>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input disabled type="text" id="autocomplete-input" name="atendente" class="atendente" value=<?php echo $atendente;?>>
                    <label for="autocomplete-input">Atendente</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <select name='lista'>
                        <option value ='null' disabled selected>Selecione</option>
                        <option value ='0'>Decrescente</option>
                        <option value ='1'>Crescente</option>
                    </select>
                    <label for="autocomplete-input">Orientação da lista</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <select name='insert'>
                        <option value ='null' disabled selected>Selecione</option>
                        <option value ='0'>Dropdown</option>
                        <option value ='1'>Autocomplete</option>
                        <option value ='2'>Misto</option>
                    </select>
                    <label for="autocomplete-input">Formato dos campos de inserção</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s1">
                    <button class="btn waves-effect waves-light green" type="submit" name="config">Salvar
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

</script>
</body>
</html>

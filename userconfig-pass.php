<?php
    require_once 'config.php';
    if(!\controller\User::checkPermission(0)){
        header('location:warning.php');
    }
    $atendente = AtendenteQuery::create()->findOneById($_SESSION['id'])->getNome();
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

    <title>Planilha do C.R.C - Configurações - Senha</title>
</head>
<body>

<div class="row">
    <form autocomplete="off" class="col s12" action="save.php" method="post">
        <div class="col s12">
            <div class="row ">
                <h3 class="green-text">Aterar Senha</h3>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input disabled type="text" id="autocomplete-input" name="atendente" class="atendente" value=<?php echo $atendente;?>>
                    <label for="autocomplete-input">Atendente</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input required type="password" id="password" name="senha" class="atendente">
                    <label for="autocomplete-input">Senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input required type="password" id="confirm_password" name="csenha" class="atendente">
                    <label for="autocomplete-input">Confirme a senha</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s1">
                    <button class="btn waves-effect waves-light green" type="submit" name="config-senha">Salvar
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

    var password = document.getElementById("password")
        , confirm_password = document.getElementById("confirm_password");

    function validatePassword(){
        if(password.value != confirm_password.value) {
            confirm_password.setCustomValidity("As senhas não são iguais");
        } else {
            confirm_password.setCustomValidity('');
        }
    }

    password.onchange = validatePassword;
    confirm_password.onkeyup = validatePassword;

</script>
</body>
</html>

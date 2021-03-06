<?php

require_once 'config.php';

if(!isset($_POST['login'])){
    if(\controller\User::checkLogado()){
        if($_SESSION['permissao'] == 0 OR $_SESSION['permissao'] == NULL){
            header('Location: lista.php');
        } elseif ($_SESSION['permissao'] == 1){
            header('location:conf-lista.php');
        } elseif ($_SESSION['permissao'] == 2){
            header('location:dashboard.php');
        }
    }
}

if(isset($_POST['login']) AND isset($_POST['senha'])){
    if(\controller\User::logar($_POST['login'],$_POST['senha'])){
        header('location:index.php');
    } else {
        header('location:index.php?error');
    }
}

?>

<!doctype html>
<html lang="pt-br">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap/signin.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <title>Planilha do C.R.C - Login</title>
</head>
<body class="text-center">
<form class="form-signin" action="index.php" method="POST">
    <img class="mb-4" src="img/footerfinal.png" alt="" width="110" height=auto>
    <h1 class="h3 mb-3 font-weight-normal">Planilha do C.R.C</h1>
    <label for="inputEmail" class="sr-only">Email</label>
    <input type="email" id="inputEmail" name="login" class="form-control" placeholder="Email" required autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" name="senha" class="form-control" placeholder="Senha" required>
    <div class="checkbox mb-3">

        <?php
            if(isset($_GET['error'])){
                echo "<p style='color: red'>Erro no acesso!</p>";
            }
        ?>

    </div>
    <button class="btn btn-lg btn-success btn-block" type="submit">Entrar</button>
</form>


</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS, then Materialize -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/materialize.min.js"></script>
</body>
</html>
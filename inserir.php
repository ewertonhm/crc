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


    <title>Planilha do C.R.C - Inserir</title>
    <?php
    require_once 'config.php';
    ?>

</head>
<body>

<label>Skills:</label>
<input type="text" id="skill_input"/>



<!-- jQuery first, then Materialize -->



<script>
    $(document).ready(function () {

    });
</script>
</body>
</html>

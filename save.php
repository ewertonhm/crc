<?php
    session_start();
    if((!isset ($_SESSION['logado']) == true) and (!isset ($_SESSION['id']) == true)){
        var_dump($_SESSION['logado']);
        var_dump($_SESSION['id']);
        unset($_SESSION['logado']);
        unset($_SESSION['id']);
        header('location:index.php');
    }
    $now = \Carbon\Carbon::now()->toDateTimeString();
    $carbon = \Carbon\Carbon::parse($now);
    $date = $carbon->isoFormat('D-MM-YYYY');

    $atendente = AtendenteQuery::create()->findOneById($_SESSION['id'])->getNome();




    echo "<pre>";
    var_dump($_POST);


    ?>


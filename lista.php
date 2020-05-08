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

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap/custom.css">

    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="css/materialize/materialize.min.css">


    <title>Planilha do C.R.C</title>
    <?php
        require_once 'config.php';
        $atendimentos = AtendimentoQuery::create()->orderByData()->orderByHora()->find();
    ?>

</head>
<body>
<div class="container-fluid full-width">
    <div class="tableFixHead">
        <nav class="navbar navbar-light bg-light">
            <a class="navbar-brand" href="#">
                <img src="img/footerfinal.png" width="30" height="30" class="d-inline-block align-top" alt="">
            </a>
            <span class="navbar-brand mb-0 h1"><a class="navbar-brand" href="logout.php">Sair</a></span>
        </nav>
        <table class="table table-hover table-striped table-sm table-dark">
            <thead>
            <tr>
                <th scope="col">Data</th>
                <th scope="col">Hora</th>
                <th scope="col">Cadastro</th>
                <th scope="col">Cliente</th>
                <th scope="col">Tipo de Cliente</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">UF</th>
                <th scope="col">Contato</th>
                <th scope="col">Motivo</th>
                <th scope="col">Contrato</th>
                <th scope="col">Agendamento</th>
                <th scope="col">Atendente</th>
                <th scope="col">Telefone</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($atendimentos as $a){echo "
                            <tr>
                                <td>".$a->getData()."</td>
                                <td>".$a->getHora()."</td>
                                <td>".$a->getCadastro()."</td>
                                <td>".$a->getCliente()."</td>
                                <td>".$a->getTipo()->getTipo()."</td>
                                <td>".$a->getBairro()->getNome()."</td>
                                <td>".$a->getCidade()->getNome()."</td>
                                <td>".$a->getEstado()->getUf()."</td>
                                <td>".$a->getContato()->getContato()."</td>
                                <td>".$a->getMotivo()->getMotivo()."</td>
                                <td>".$a->getContrato()->getContrato()."</td>
                                <td>".$a->getAgendamento()->getAgendamento()."</td>
                                <td>".$a->getAtendente()->getNome()."</td>
                                <td>".$a->getTelefone()."</td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large green" href="inserir.php">
            <i class="large material-icons">add</i>
        </a>
    </div>

    <!-- <div class="btnMaisBotoes">
        <div class="col-6 btnMaisBotoesGrupo" style="display: none;">
            <button class="btn btn-primary btnCircular btnSecundario"><i class="fa fa-user"></i></button>
            <button class="btn btn-primary btnCircular btnSecundario"><i class="fa fa-facebook-square"></i></button>
            <button class="btn btn-primary btnCircular btnSecundario"><i class="fa fa-map"></i></button>
        </div>
        <div class="col-3 btnMaisBotoesBtn">
            <button class="btn pmd-btn-fab pmd-ripple-effect btn-primary btn-info btnCircular btnPrincipal" name="2"><i class="fa fa-plus"></i></button>
        </div>
    </div> -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var elems = document.querySelectorAll('.fixed-action-btn');
        var instances = M.FloatingActionButton.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function(){
        $('.fixed-action-btn').floatingActionButton();
    });


</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS, then Materialize -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/materialize.min.js"></script>
</body>
</html>
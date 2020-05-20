<?php
    require_once 'config.php';
    if(!\controller\User::checkPermission(2)){
        header('location:warning.php');
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

    <title>Planilha do C.R.C - Bairros</title>
    <link rel="icon" href="img/footerfinal.png" sizes="16x16 32x32" type="image/png">

</head>
<body class="bg-dark">
<div class="container-fluid full-width">
    <div class="tableFixHead">
        <nav class="bg-dark">
            <div class="nav-wrapper">
                <a class="brand-logo center"><img src="img/footerfinal.png" width="45" height="45" class="d-inline-block" alt=""></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="black-text"><a href="dashboard.php"><i class="large material-icons">exit_to_app</i></a></li>
                </ul>
            </div>
        </nav>
        <table id="lista" class="table table-hover table-striped table-dark">
            <thead>
            <tr>
                <th scope="col">Ativo</th>
                <th scope="col">Id</th>
                <th scope="col">Nome</th>
                <th scope="col">Cidade</th>
                <th scope="col">Editar</th>
                <th scope="col">Excluir</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    $dados = BairroQuery::create()->orderByNome()->find();
                    foreach ($dados as $d){
                        $table1 = '';
                        $table2 = '';
                        $table3 = '';
                        $ativo = '';

                        if($d->getId() != NULL){
                            $table1 = $d->getId();
                        }
                        if($d->getNome() != NULL){
                            $table2 = $d->getNome();
                        }
                        if($d->getCidade() != NULL){
                            $table3 = $d->getCidade()->getNome();
                        }
                        if($d->getDesabilitado() == 1){
                            $ativo = 'clear';
                        } else {
                            $ativo = 'check';
                        }
                        echo "
                            <tr>
                                <td><i class='small text-white material-icons'>".$ativo."</i></td>
                                <td>".$table1."</td>
                                <td>".$table2."</td>
                                <td>".$table3."</td>
                                <td><a href='edit-bairro.php?id=".$table1."'><i class='small text-white material-icons'>edit</i></a></td>
                                <td><a href='del-bairro.php?id=".$table1."'><i class='small text-white material-icons'>delete</i></a></td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="fixed-action-btn">
        <a class="btn-floating btn-large green" href="add-bairro.php">
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
<script src="js/jquery-3.5.1.min.js"></script>
</body>
</html>
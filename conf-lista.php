<?php
    require_once 'config.php';
    if(!\controller\User::checkPermission(1)){
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

    <title>Planilha do C.R.C</title>
    <link rel="icon" href="img/footerfinal.png" sizes="16x16 32x32" type="image/png">
    <?php
        $atendimentos = '';
        if(AtendenteQuery::create()->findOneById($_SESSION['id'])->getLista() == 1){
            $atendimentos = AtendimentoQuery::create()->orderByData('desc')->orderByHora('desc')->orderById('desc')->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->find();
        } else {
            $atendimentos = AtendimentoQuery::create()->orderByData()->orderByHora()->orderById()->where('atendimento.data like ?', \Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('%MM/YYYY'))->find();
        }
    ?>

</head>
<body class="bg-dark">
<div class="container-fluid full-width">
    <div class="tableFixHead">
        <nav class="bg-dark">
            <div class="nav-wrapper">
                <a class="brand-logo center"><img src="img/footerfinal.png" width="45" height="45" class="d-inline-block" alt=""></a>
                <ul id="nav-mobile" class="right hide-on-med-and-down">
                    <li class="black-text"><a href="userconfig.php"><i class="large material-icons">build</i></a></li>
                    <li class="black-text"><a href="logout.php"><i class="large material-icons">exit_to_app</i></a></li>
                </ul>
            </div>
        </nav>
        <table id="lista" class="table table-hover table-striped table-sm table-dark">
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
                <th scope="col">Solicitação</th>
                <th scope="col">Motivo</th>
                <th scope="col">Contrato</th>
                <th scope="col">Agendamento</th>
                <th scope="col">Atendente</th>
                <th scope="col">Telefone</th>
                <th scope="col">Conferir</th>
            </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($atendimentos as $a){
                        $id = '';
                        $data = '';
                        $hora = '';
                        $cadastro = '';
                        $cliente = '';
                        $tipo = '';
                        $bairro = '';
                        $cidade = '';
                        $estado = '';
                        $contato = '';
                        $solicitacao = '';
                        $motivo = '';
                        $contrato = '';
                        $agendamento = '';
                        $atendente = '';
                        $telefone = '';
                        $tag = '';

                        if ($a->getId() != NULL){
                            $id = $a->getId();
                        }
                        if($a->getData() != NULL){
                            $data = $a->getData();
                        }
                        if($a->getHora() != NULL){
                            $hora = $a->getHora();
                        }
                        if($a->getCadastro() != NULL){
                            $cadastro = $a->getCadastro();
                        }
                        if($a->getCliente() != NULL){
                            $cliente = $a->getCliente();
                        }
                        if($a->getTipo() != NULL){
                            if($a->getTipo()->getTipo() != NULL){
                                $tipo = $a->getTipo()->getTipo();
                            }
                        }
                        if($a->getBairro() != NULL){
                            if($a->getBairro()->getNome() != NULL){
                                $bairro = $a->getBairro()->getNome();
                            }
                        }
                        if($a->getCidade() != NULL){
                            if($a->getCidade()->getNome() != NULL){
                                $cidade = $a->getCidade()->getNome();
                            }
                        }
                        if($a->getEstado() != NULL){
                            if($a->getEstado()->getUf() != NULL){
                                $estado = $a->getEstado()->getUf();
                            }
                        }
                        if($a->getContato() != NULL){
                            if($a->getContato()->getContato() != NULL){
                                $contato = $a->getContato()->getContato();
                            }
                        }
                        if($a->getSolicitacao() != NULL){
                            if($a->getSolicitacao()->getSolicitacao() != NULL){
                                $solicitacao = $a->getSolicitacao()->getSolicitacao();
                            }
                        }
                        if($a->getMotivo() != NULL){
                            if($a->getMotivo()->getMotivo() != NULL){
                                $motivo = $a->getMotivo()->getMotivo();
                            }
                        }
                        if($a->getContrato() != NULL){
                            if($a->getContrato()->getContrato() != NULL){
                                $contrato = $a->getContrato()->getContrato();
                            }
                        }
                        if($a->getAgendamento() != NULL){
                            if($a->getAgendamento()->getAgendamento() != NULL){
                                $agendamento = $a->getAgendamento()->getAgendamento();
                            }
                        }
                        if($a->getAtendente() != NULL){
                            if($a->getAtendente()->getNome() != NULL){
                                $atendente = $a->getAtendente()->getNome();
                            }
                        }
                        if($a->getTelefone() != NULL){
                            $telefone = $a->getTelefone();
                        }
                        if($a->getTagId() != NULL){
                            if($a->getTagId() == 0){
                                $tag = "class='red'";
                            } elseif ($a->getTagId() == 1){
                                $tag = "class='green'";
                            } elseif ($a->getTagId() == 2){
                                $tag = "class='blue'";
                            } elseif ($a->getTagId() == 3){
                                $tag = "class='yellow'";
                            } elseif ($a->getTagId() == 4){
                                $tag = "class='orange'";
                            } elseif ($a->getTagId() == 5){
                                $tag = "class='pink'";
                            }

                        }

                        echo "
                            <tr".$tag.">
                                <td>".$data."</td>
                                <td>".$hora."</td>
                                <td>".$cadastro."</td>
                                <td>".$cliente."</td>
                                <td>".$tipo."</td>
                                <td>".$bairro."</td>
                                <td>".$cidade."</td>
                                <td>".$estado."</td>
                                <td>".$contato."</td>
                                <td>".$solicitacao."</td>
                                <td>".$motivo."</td>
                                <td>".$contrato."</td>
                                <td>".$agendamento."</td>
                                <td>".$atendente."</td>
                                <td>".$telefone."</td>
                                <td><a href='conf-atendimento.php?id=".$id."' target='_blank'><i class='small text-white material-icons'>check_box_outline_blank</i></a></td>
                            </tr>
                        ";
                    }
                ?>
            </tbody>
        </table>
    </div>
    <div class="fixed-action-btn">
        <button class="btn-floating btn-large green" onClick="scrollToBottom()"><i class="large material-icons">arrow_downward</i></button>
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

    function scrollToBottom () {
        $('html,body').animate({scrollTop: document.body.scrollHeight},"fast");
    }


</script>
<!-- jQuery first, then Popper.js, then Bootstrap JS, then Materialize -->
<script src="js/jquery-3.4.1.slim.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/materialize.min.js"></script>
<script src="js/jquery-3.5.1.min.js"></script>
</body>
</html>
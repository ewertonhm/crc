<?php
    session_start();
    if((!isset ($_SESSION['logado']) == true) and (!isset ($_SESSION['id']) == true)){
        var_dump($_SESSION['logado']);
        var_dump($_SESSION['id']);
        unset($_SESSION['logado']);
        unset($_SESSION['id']);
        header('location:index.php');
    }

if(isset($_POST['action'])){
        require_once 'config.php';
        $atendimento = new Atendimento();

        $atendimento->setData(\Carbon\Carbon::parse(\Carbon\Carbon::now()->toDateTimeString())->isoFormat('D/MM/YYYY'));

        $atendente = AtendenteQuery::create()->findOneById($_SESSION['id'])->getNome();
        $atendimento->setAtendenteId($_SESSION['id']);

        if(isset($_POST['cidade'])){
            $cidade = CidadeQuery::create()->findOneByNome($_POST['cidade']);
            if($cidade != NULL){
                $atendimento->setCidadeId($cidade->getId());
                $atendimento->setEstadoId($cidade->getEstadoId());
            }
        }
        /* REMOVIDO
        if(isset($_POST['uf'])){
            $uf = EstadoQuery::create()->findOneByUf($_POST['uf']);
            if($uf != NULL){
                $atendimento->setEstadoId($uf->getId());
            }
        }
        */
        if(isset($_POST['bairro'])){
            $bairro = BairroQuery::create()->findOneByNome($_POST['bairro']);
            if($bairro != NULL){
                $atendimento->setBairroId($bairro->getId());
            }
        }
        if(isset($_POST['hora'])){
            $atendimento->setHora($_POST['hora']);
        }
        if(isset($_POST['cadastro']) AND (int)$_POST['cadastro'] != 0){
            $atendimento->setCadastro((int)$_POST['cadastro']);
        }
        if(isset($_POST['cliente'])){
            $atendimento->setCliente($_POST['cliente']);
        }
        if(isset($_POST['tipo']) AND (int)$_POST['tipo'] != 0){
            $atendimento->setTipoId((int)$_POST['tipo']);
        }
        if(isset($_POST['telefone'])){
            $atendimento->setTelefone($_POST['telefone']);
        }
        if(isset($_POST['contato']) AND (int)$_POST['contato'] != 0){
            $atendimento->setContatoId((int)$_POST['contato']);
        }
        if(isset($_POST['solicitacao']) AND (int)$_POST['solicitacao'] != 0){
            $atendimento->setSolicitacaoId((int)$_POST['solicitacao']);
        }
        if(isset($_POST['motivo']) AND (int)$_POST['motivo'] != 0){
            $atendimento->setMotivoId((int)$_POST['motivo']);
        }
        if(isset($_POST['contrato']) AND (int)$_POST['contrato'] != 0){
            $atendimento->setContratoId((int)$_POST['contrato']);
        }
        if(isset($_POST['agendamento']) AND (int)$_POST['agendamento'] != 0){
            $atendimento->setAgendamentoId((int)$_POST['agendamento']);
        }
        $atendimento->save();
        header('location:lista.php');
    } else if(isset($_POST['config'])){
        require_once 'config.php';

        $atendente = AtendenteQuery::create()->findOneById($_SESSION['id']);

        if(isset($_POST['lista'])){
            $atendente->setLista((int)$_POST['lista']);
        }
        if(isset($_POST['config'])){
            $atendente->setForm((int)$_POST['insert']);
        }
        $atendente->save();
        header('location:lista.php');
    } else {
        header('location:lista.php');
    }
?>


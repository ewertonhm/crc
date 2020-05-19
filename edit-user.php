<?php
    require_once 'config.php';
    if(!\controller\User::checkPermission(2)){
        header('location:warning.php');
    }
    require_once 'config.php';
    $dados = AtendenteQuery::create()->findOneById((int)$_GET['id']);
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

    <title>Planilha do C.R.C - Inserir Usuário</title>
</head>
<body>

<div class="row">
    <form autocomplete="off" name="form1" class="col s12" action="save-user.php?id=<?php echo $dados->getId();?>" method="post">
        <div class="col s12">
            <div class="row ">
                <h3 class="green-text">Editar Usuário</h3>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="id" class="nome" value="<?php echo $dados->getId();?>" disabled>
                    <label for="autocomplete-input">ID</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="text" name="nome" class="nome" value="<?php echo $dados->getNome();?>">
                    <label for="autocomplete-input">Nome</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="email" name="login" class="nome" value="<?php echo $dados->getLogin();?>">
                    <label for="autocomplete-input">Email</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <input type="password" name="senha" class="nome">
                    <label for="autocomplete-input">Para alterar a senha digite a nova senha:</label>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s3">
                    <select name='permissao'>
                        <option value ='0' <?php if($dados->getPermissao() == 0 OR $dados->getPermissao() == null){echo 'selected';} ?>>Atendimento</option>
                        <option value ='1'  <?php if($dados->getPermissao() == 1){echo 'selected';} ?>>Pós Atendimento</option>
                        <option value ='2'  <?php if($dados->getPermissao() == 2){echo 'selected';} ?>>Administrador</option>
                    </select>
                    <label for="autocomplete-input">Tipo de usuário</label>
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

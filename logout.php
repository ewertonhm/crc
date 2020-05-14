<?php
session_start();
unset($_SESSION['logado']);
unset($_SESSION['id']);
unset($_SESSION['permissao']);
session_destroy();
header('location:index.php');
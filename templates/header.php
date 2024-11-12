<?php

    include_once("config/url.php");
    include_once("config/process.php");

    // Limpa mensagem

    if(isset($_SESSION['msg'])){
        $printMsg = $_SESSION['msg'];
        $_SESSION['msg'] = '';
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda de contatos</title>
    <!-- BOOTSTRAP TA AQUI -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- FONT DE ICONES AI: -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- CSS DA MASSA -->
    <link rel="stylesheet" href="<?php echo $BASE_URL; ?>css/styles.css">
</head>
<body>
    <header>
        <!--É uma classe especifica para uso de algumas funcionalidades do BOOTSTRAP-->
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="<?php echo $BASE_URL; ?>index.php">
                <img src="<?php echo $BASE_URL; ?>img/logo.svg" alt="Agenda">
            </a>
            <div>
                <div class="navbar-nav">
                    <a class="nav-link active" id="home-link" href="<?php echo $BASE_URL; ?>index.php">Agenda</a>
                    <a class="nav-link active" href="<?php echo $BASE_URL; ?>create.php">Adicionar Contato</a>
                </div>
            </div>
        </nav> 
    </header>
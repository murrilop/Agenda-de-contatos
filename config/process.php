<?php

    session_start();

    include_once("conection.php");
    include_once("url.php");

    
    $id;
    
    if(!empty($_GET)){
        $id = $_GET["id"];
    }

// Retorna o dado de um contato só

    if(!empty($id)){

        $query = "SELECT * FROM contacts where id = :id";
        
        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        $stmt->execute();

        $contact = $stmt->fetch();

    }else{
    // Retorna todos os contatos (as vezes)
    $contacts = [];

    $query = "SELECT * from contacts";
    
    $stmt = $conn->prepare($query);

    $stmt->execute();

    $contacts = $stmt->fetchALL();
    }


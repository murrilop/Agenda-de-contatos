<?php

    session_start();

    include_once("conection.php");
    include_once("url.php");

    
    $id;

    $data = $_POST;
    //MODIFICAÇÕES NO BANCO
    if(!empty($data)){

     //CRIAR CONTATO    
     
     if($data["type"] === "create"){
        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];

        $query = "INSERT INTO contacts(name, phone, observations)VALUES(:name, :phone, :observations)";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);

        try{
            $stmt->execute();
            $_SESSION['msg'] = 'Contato criado com sucesso';

        } catch(PDOException $e){
            //erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }else if($data["type"] === "edit"){

        $name = $data["name"];
        $phone = $data["phone"];
        $observations = $data["observations"];
        $id = $data["id"];

        $query = "UPDATE contacts set name = :name, phone = :phone, observations = :observations where id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":name", $name);
        $stmt->bindParam(":phone", $phone);
        $stmt->bindParam(":observations", $observations);
        $stmt->bindParam(":id", $id);

        try{
            $stmt->execute();
            $_SESSION['msg'] = 'Contato editado com sucesso!';

        } catch(PDOException $e){
            //erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    
    }else if($data["type"] === "delete"){
        $id = $data["id"];

        $query = "DELETE from contacts WHERE id = :id";

        $stmt = $conn->prepare($query);

        $stmt->bindParam(":id", $id);

        try{
            $stmt->execute();
            $_SESSION['msg'] = 'Contato deletado com sucesso!';

        } catch(PDOException $e){
            //erro na conexão
            $error = $e->getMessage();
            echo "Erro: $error";
        }
    }
    //REDIRECT HOME
    header("location:" . $BASE_URL . "../index.php");

     //SELEÇÃO DE DADOS
    }else{

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
    }


//FECHAR CONEXÃO

$conn = null;
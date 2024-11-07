<?php

    session_start();

    include_once("conection.php");
    include_once("url.php");

    $contacts = [];

    $query = "SELECT * from contacts";
    
    $stmt = $conn->prepare($query);

    $stmt->execute();

    $contacts = $stmt->fetchALL();
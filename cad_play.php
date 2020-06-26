<?php

include "conexao.php";

$conn = connect();

    try {
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // prepare sql and bind parameters
      $stmt = $conn->prepare("INSERT INTO players (nome, jogo, apelido, email)
      VALUES (:nome, :jogo, :apelido, :email)");
      $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':jogo', $jogo);
      $stmt->bindParam(':apelido', $apelido);
      $stmt->bindParam(':email', $email);

      $nome    = $_POST['nome'];
      $jogo    = $_POST['jogo'];
      $apelido = $_POST['apelido'];
      $email   = $_POST['email'];
      
      $stmt->execute();

     // echo "New records created successfully";
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

    $conn = null;

    header('location: view_list.php');
?>
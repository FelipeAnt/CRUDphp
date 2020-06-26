<?php

include "conexao.php";

$conn = connect();

    try {
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // prepare sql and bind parameters
      $stmt = $conn->prepare("UPDATE players SET nome=:nome, jogo=:jogo, apelido=:apelido, email=:email WHERE id=:id");
      $stmt->bindParam(':id', $id);
      $stmt->bindParam(':nome', $nome);
      $stmt->bindParam(':jogo', $jogo);
      $stmt->bindParam(':apelido', $apelido);
      $stmt->bindParam(':email', $email);

      $id      = $_GET['id'];
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
<?php

include "conexao.php";

$conn = connect();

    try {
      // set the PDO error mode to exception
      $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      // prepare sql and bind parameters
      $stmt = $conn->prepare("DELETE FROM players WHERE id=:id");
      $stmt->bindParam(':id', $id);
      $id    = $_GET['id'];

      
      $stmt->execute();

     // echo "Player Excluido";
    } catch(PDOException $e) {
      echo "Error: " . $e->getMessage();
    }

    $conn = null;

    header('location: view_list.php');
?>
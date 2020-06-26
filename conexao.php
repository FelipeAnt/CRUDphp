<?php
	
	function connect(){
		$servername = "sql103.epizy.com";
		$username   = "epiz_26098978";
		$password   = "etcwwXVyoj5EP";
		$db         = "epiz_26098978_stk";

		try {
		  $conn = new PDO("mysql:host=$servername;dbname=$db;charset=utf8", $username, $password);
		  // set the PDO error mode to exception
		  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  //echo "Conexão bem-sucedida";
		  return $conn;
		  
		} catch(PDOException $e) {
		  echo "Conexão falhou: " . $e->getMessage();
		}
	}	

?>
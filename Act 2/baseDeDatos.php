<?php
  require('config.php');

  //--- Aplicable a Sentencias INSERT, UPDATE, DELETE ---//
  
  $sql = "INSERT INTO nombre_tabla (firstname, lastname, email)
  VALUES ('John', 'Doe', 'john@example.com')";
  
  // Utilizar exec() dado que no se regresan resultados
  $conn->exec($sql);
  
  //------------------------------------//
  //--- Aplicable a Sentencia SELECT ---//
  
  $sql = "SELECT * FROM nombre_tabla";
  $stmt = $conn->prepare($sql);
  $stmt->execute();

  // Configura los resultados como un arreglo asociativo
  $stmt->setFetchMode(PDO::FETCH_ASSOC);
  
  // $stmt->fetchAll() Obtiene el arreglo asociativo
  foreach ($stmt->fetchAll() as $row) {
	//...Implementar
  }
?>
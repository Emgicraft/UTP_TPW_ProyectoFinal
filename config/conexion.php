<?php
	// Establecer conexión con la BD:
	// Haciendo uso de la Tecnología PDO (PHP Data Object)
	$cdn = "mysql:host=127.0.0.1;dbname=BD_Market";
	$usr = "root";
	$clv = "";

	$cnx = new PDO($cdn, $usr, $clv); // cadena, usuario, clave
?>
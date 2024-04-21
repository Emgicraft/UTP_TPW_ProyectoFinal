<?php
	if (isset($_GET["codCliente"])) {
		$IDvalor = $_GET["codCliente"];
		// Iniciamos la conexion con la DB:
		require_once "../config/conexion.php";

		// Preparar la sentencia SQL:
		$sentencia = $cnx->prepare("DELETE FROM cliente WHERE id=:cliente_ID");

		// Pasamos el parámetro SQL:
		$sentencia->bindvalue(":cliente_ID", $IDvalor);

		// Ejecutamos dicha sentencia:
		$sentencia->execute();

		echo "<script> location.href='index.php'; </script>";
	} else {
		echo "<script> alert('Producto ID:".$_GET["codCliente"]."no encontrado!'); location.href='index.php'; </script>";
	}
?>
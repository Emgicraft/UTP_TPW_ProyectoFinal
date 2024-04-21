<?php
	if (isset($_GET["codProd"])) {
		$IDvalor = $_GET["codProd"];
		// Iniciamos la conexion con la DB:
		require_once "../config/conexion.php";

		// Preparar la sentencia SQL:
		$sentencia = $cnx->prepare("DELETE FROM producto WHERE id=:producto_ID");

		// Pasamos el parámetro SQL:
		$sentencia->bindvalue(":producto_ID", $IDvalor);

		// Ejecutamos dicha sentencia:
		$sentencia->execute();

		echo "<script> location.href='index.php'; </script>";
	} else {
		echo "<script> alert('Producto ID:".$_GET["codProd"]."no encontrado!'); location.href='index.php'; </script>";
	}
?>
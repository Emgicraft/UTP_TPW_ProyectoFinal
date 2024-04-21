<!DOCTYPE html>
<html lang="es-PE">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar cliente</title>
</head>
<body>
	<h1>Editar Cliente</h1><br>
	
	<?php
		if (isset($_GET["codCliente"])) {
			$idC = $_GET["codCliente"];

			// Incluir un archivo PHP:
			require_once "../config/conexion.php";

			// Preparamos la sentencia SQL:
			$sentencia = $cnx->prepare("SELECT * FROM cliente WHERE id=:codC;");

			// Pasamos los parámetros SQL:
			$sentencia->bindvalue(":codC", $idC);

			// Ejecutamos la sentencia SQL:
			$sentencia->execute();

			// Sabemos que es una sola fila, así que la recojemos:
			$fila = $sentencia->fetch();

			// Guardamos los demas campos:
			$nombre = $fila["nombre"];
			$numRUC = $fila["numruc"];
			$direc = $fila["direccion"];
			$tlfn = $fila["telefono"];
			
		} elseif (isset($_GET["txtID"])) {
			$idC = $_GET["txtID"];
			$nombre = $_GET["txtNombre"];
			$numRUC = $_GET["txtNumRUC"];
			$direc = $_GET["txtDirec"];
			$tlfn = $_GET["txtTelefono"];

			// Conectamos con la BD:
			require_once "../config/conexion.php";

			// Preparamos la sentencia SQL:
			$sentencia = $cnx->prepare("UPDATE cliente SET nombre=:nombre, numruc=:numruc, direccion=:drc, telefono=:telefono WHERE id=:codClt;");

			// Pasamos los parámetros SQL:
			$sentencia->bindvalue(":codClt", $idC);
			$sentencia->bindvalue(":nombre", $nombre);
			$sentencia->bindvalue(":numruc", $numRUC);
			$sentencia->bindvalue(":drc", $direc);
			$sentencia->bindvalue(":telefono", $tlfn);

			// Ejecutamos la sentencia SQL:
			$sentencia->execute();

			echo "<h3>Cliente Actualizado</h3><br>";

		} else {
			$idC = 0;
			$nombre = "";
			$numRUC = "";
			$direc = "";
			$tlfn = "";
		}
		
	?>
	
	<form>
		<table>
			<tr>
				<td><label>Código:</label></td>
				<td><input type="text" name="txtID" size="6" value=<?php echo $idC ?> readonly></td>
			</tr>
				<!-- Se pone 'name' a las etiquetas que enviaré. -->
			<tr>
				<td><label>Nombre:</label></td>
				<td><input type="text" name="txtNombre" size="50" value="<?php echo $nombre ?>"></td>
			</tr>

			<tr>
				<td><label>Número RUC:</label></td>
				<td><input type="text" name="txtNumRUC" size="12" value=<?php echo $numRUC ?>></td>
			</tr>

			<tr>
				<td><label>Dirección:</label></td>
				<td><input type="text" name="txtDirec" size="12" value=<?php echo $direc ?>></td>
			</tr>

			<tr>
				<td><label>Teléfono:</label></td>
				<td><input type="text" name="txtTelefono" size="12" value=<?php echo $tlfn ?>></td>
			</tr>

			<tr>
				<td><a href="index.php">Retornar</a></td>
				<td><input type="submit" value="Guardar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
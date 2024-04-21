<!DOCTYPE html>
<html lang="es-PE">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar nuevo cliente</title>
</head>
<body>
	<h1>Nuevo Cliente</h1><br>

	<?php
		if (isset($_GET["txtID"])) {
			$id = $_GET["txtID"];
			$nombre = $_GET["txtNombre"];
			$ruc = $_GET["txtNumRUC"];
			$dir = $_GET["txtDirec"];
			$tlf = $_GET["txtTlf"];

			if ($id==0) {
				// Insertar el nuevo Producto //
				// Incluir un archivo PHP:
				require_once "../config/conexion.php";

				// Preparamos la sentencia SQL:
				$sentencia = $cnx->prepare("INSERT INTO cliente (nombre, numruc, direccion, telefono) values (:nombre, :nRuc, :direc, :telef);");

				// Pasamos los parámetros SQL:
				$sentencia->bindvalue(":nombre", $nombre);
				$sentencia->bindvalue(":nRuc", $ruc);
				$sentencia->bindvalue(":direc", $dir);
				$sentencia->bindvalue(":telef", $tlf);

				// Ejecutamos la sentencia SQL:
				$sentencia->execute();


				// Recuperar el ID del nuevo producto //

				// Preparamos otra sentencia SQL:
				$sentencia = $cnx->prepare("SELECT max(id) as nuevoID FROM cliente;");

				// Ejecutamos la sentencia SQL:
				$sentencia->execute();

				// Sabemos que es una sola fila, así que la recojemos:
				$fila = $sentencia->fetch();

				// Guardamos el nuevo ID:
				$id = $fila["nuevoID"];
			}
			
		} else {
			$id = 0;
			$nombre = "";
			$ruc = "";
			$dir = "";
			$tlf = "";
		}
	?>

	<a href="agregar_cliente.php">Nuevo</a><br>

	<form>
		<table>
			<tr>
				<td><label>Código:</label></td>
				<td><input type="text" name="txtID" size="6" value=<?php echo $id ?> readonly></td>
			</tr>
				<!-- Se pone 'name' a las etiquetas que enviaré. -->
			<tr>
				<td><label>Nombre:</label></td>
				<td><input type="text" name="txtNombre" size="50" value="<?php echo $nombre ?>"></td>
			</tr>

			<tr>
				<td><label>RUC:</label></td>
				<td><input type="text" name="txtNumRUC" size="20" value="<?php echo $ruc ?>"></td>
			</tr>

			<tr>
				<td><label>Dirección</label></td>
				<td><input type="text" name="txtDirec" size="70" value=<?php echo $dir ?>></td>
			</tr>

			<tr>
				<td><label>Teléfono</label></td>
				<td><input type="text" name="txtTlf" size="20" value=<?php echo $tlf ?>></td>
			</tr>

			<tr>
				<td><a href="index.php">Retornar</a></td>
				<td><input type="submit" value="Guardar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
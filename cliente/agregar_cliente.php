<!DOCTYPE html>
<html lang="es-PE">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<title>Agregar nuevo cliente</title>
</head>
<body>
	<header>
		<h1><i class='bx bxs-user'></i>Nuevo Cliente</h1>
	</header>

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

	<main>
		<div class="contenedor contenedorADD">
			<form class="formADD">
				<label>ID:</label>
				<input class="inputADD" type="text" name="txtID" size="6" value=<?php echo $id ?> readonly disabled>
				<!-- Se pone 'name' a las etiquetas que enviaré. -->
				<label>Nombre:</label>
				<input class="inputADD" type="text" name="txtNombre" size="50" value="<?php echo $nombre ?>">
				
				<label>RUC:</label>
				<input class="inputADD" type="text" name="txtNumRUC" size="20" value="<?php echo $ruc ?>">
				
				<label>Dirección</label>
				<input class="inputADD" type="text" name="txtDirec" size="70" value=<?php echo $dir ?>>
				
				<label>Teléfono</label>
				<input class="inputADD" type="text" name="txtTlf" size="20" value=<?php echo $tlf ?>>
				
				<input class="inputADD" type="submit" value="Guardar">
			</form>
		</div>
		<div class="contenedor contenedorADD">
			<a href="index.php"><div class="contenedor__enlaces">Retornar</div></a>
			<a href="agregar_cliente.php"><div class="contenedor__enlaces">Nuevo</div></a>
		</div>
	</main>
</body>
</html>
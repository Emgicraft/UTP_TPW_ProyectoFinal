<!DOCTYPE html>
<html lang="es-PE">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<title>Editar cliente</title>
</head>
<body>
	<header>
		<i class='bx bxs-user'></i><h1>Editar Cliente</h1>
	</header>
	
	<?php
		if (isset($_GET["codCliente"])) {
			$idC = $_GET["codCliente"];

			// Incluir un archivo PHP:
			require_once "../config/conexion.php";

			// Preparamos la sentencia SQL:
			$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE ID_Cliente=:codC;");

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
			$sentencia = $cnx->prepare("UPDATE Cliente SET Nombre=:nombre, NumRuc=:numruc, Direccion=:drc, Telefono=:telefono WHERE ID_Cliente=:codClt;");

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
	<main>
		<div class="contenedor contenedorADD">
			<form class="formADD">
				<label>Código:</label>
				<input class="inputADD" type="text" name="txtID" size="6" value=<?php echo $idC ?> readonly disabled>
				
				<label>Nombre:</label>
				<input class="inputADD" type="text" name="txtNombre" size="50" value="<?php echo $nombre ?>"></td>
				
				<label>Número RUC:</label>
				<input class="inputADD" type="text" name="txtNumRUC" size="12" value=<?php echo $numRUC ?>></td>
				
				<label>Dirección:</label>
				<input class="inputADD" type="text" name="txtDirec" size="12" value=<?php echo $direc ?>></td>
				
				<label>Teléfono:</label>
				<input class="inputADD" type="text" name="txtTelefono" size="12" value=<?php echo $tlfn ?>></td>

				<input class="inputADD" type="submit" value="Guardar">
			</form>
		</div>
		<div class="contenedor contenedorADD">
			<a href="index.php"><div class="contenedor__enlaces">Retornar</div></a>
		</div>
	</main>
</body>
</html>
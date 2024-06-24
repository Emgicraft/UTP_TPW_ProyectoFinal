<!DOCTYPE html>
<html lang="es-PE">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Cliente</title>
	<style>
		table {
			border: 1px solid black; /* Borde de 1px de grosor, sólido y negro */
			border-collapse: collapse; /* Para que los bordes de las celdas se fusionen */
    	}

		th, td {
			border: 1px solid black; /* Borde de las celdas */
			padding: 8px; /* Espaciado interno para que no queden pegadas al borde */
		}
	</style>
	<script type="text/javascript">
		function confirmar(ruta) {
			var r = confirm("¿Está seguro que desea continuar?");
			parent.location = r ? ruta : "";
		}
	</script>
</head>

<body>
	<h1>Cliente</h1>
	
	<br>

	<nav>
		<a href="../">Retornar</a>
		<a href="agregar_cliente.php">Agregar un nuevo cliente</a>
	</nav>

	<hr>

	<!-- CODIGO PHP -->
	<?php
	// Inicializando otras variables:
	$tabla = array();

	// Si existe el valor enviado:
	if (isset($_GET["txtValor"])) {
		// Se recoje y almacena:
		$valor = $_GET["txtValor"];
		$filtro = $_GET["lstCabecera"];

		// Solo si la cadena es un poco laga, lo buscará:
		if (strlen($valor) >= 2) {
			// Incluir un archivo PHP:
			require_once "../config/conexion.php";

			// Preparar la sentencia SQL:
			switch ($filtro) {
				case 'id':
					$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE ID_Cliente LIKE CONCAT('%', :vlr, '%');");
					break;
				case 'nombre':
					$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE Nombre LIKE CONCAT('%', :vlr, '%');");
					break;
				case 'numruc':
					$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE NumRuc LIKE CONCAT('%', :vlr, '%');");
					break;
				case 'direccion':
					$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE Direccion LIKE CONCAT('%', :vlr, '%');");
					break;
				case 'telefono':
					$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE Telefono LIKE CONCAT('%', :vlr, '%');");
					break;
				default:
					$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE Nombre LIKE CONCAT('%', :vlr, '%');");
					break;
			}

			// Pasamos el parámetro SQL:
			$sentencia->bindvalue(":vlr", $valor);

			// Ejecutamos dicha sentencia:
			$sentencia->execute();

			// Recojemos las filas generadas en una matriz bidimensional:
			$tabla = $sentencia->fetchAll();
		}
	} else {
		// Sino, este será el valor predeterminado:
		$valor = "";
		$filtro = "";
	}
	?>

	<form> <!-- Por defecto es: method="get" -->
		<label>Elija el campo y el valor a buscar:</label><br>
		<select name="lstCabecera" required>
			<!-- <option value="selecciona">Selecciona una opción...</option> -->
			<option value="id">Por código</option>
			<option value="nombre" selected>Por nombre</option> <!--Default -->
			<option value="numruc">Por RUC</option>
			<option value="direccion">Por dirección</option>
			<option value="telefono">Por teléfono</option>
		</select>
		<input type="text" name="txtValor" value="<?php echo $valor ?>">
		<input type="submit" value="Buscar">
	</form>
	<br>

	<table border=1>
		<tr>
			<th>Código</th>
			<th>Nombre</th>
			<th>RUC</th>
			<th>Dirección</th>
			<th>Teléfono</th>
		</tr>

		<?php
		foreach ($tabla as $registro) {
		?>

			<tr>
				<td><?php echo $registro["id"]; ?></td>
				<td><?php echo $registro["nombre"]; ?></td>
				<td><?php echo $registro["numruc"]; ?></td>
				<td><?php echo $registro["direccion"]; ?></td>
				<td><?php echo $registro["telefono"]; ?></td>
				<td><a href="<?php echo 'editar_cliente.php?codCliente=' . $registro['id']; ?>">Editar</a></td>
				<td><a href="javascript:confirmar('eliminar_cliente.php?codCliente=<?php echo $registro["id"]; ?>')">Eliminar</a></td>
			</tr>

		<?php
		}
		?>

	</table>
</body>

</html>
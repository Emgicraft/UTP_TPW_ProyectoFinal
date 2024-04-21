<!DOCTYPE html>
<html lang="es-PE">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Producto</title>
	<script type="text/javascript">
		function confirmar(ruta) {
			var r = confirm("¿Está seguro que desea continuar?");
			parent.location = r ? ruta : "";
		}
	</script>
</head>
<body>
	<h1>Producto</h1><br>

	<table>
		<tr><td><a href="..\">Retornar</a></td></tr>
		<tr><td><a href="agregar_producto.php">Agregar un nuevo producto</a></td></tr>
	</table>
	
	<hr>

	<!-- CODIGO PHP -->
	<?php
		// Inicializando otras variables:
		$tabla = array();

		// Si existe el valor enviado:
		if (isset($_GET["txtValor"])) {
			// Se recoje y almacena:
			$valor = $_GET["txtValor"];

			// Solo si la cadena es un poco laga, lo buscará:
			if (strlen($valor)>=2) {
				// Incluir un archivo PHP:
				require_once "../config/conexion.php";

				// Preparar la sentencia SQL:
				//$sentencia = $cnx->prepare("select * from producto");
				$sentencia = $cnx->prepare("SELECT * FROM producto WHERE descripcion LIKE CONCAT('%', :dscr, '%');");

				// Pasamos el parámetr SQL:
				$sentencia->bindvalue(":dscr", $valor);

				// Ejecutamos dicha sentencia:
				$sentencia->execute();

				// Recojemos las filas generadas en una matriz bidimensional:
				$tabla = $sentencia->fetchAll();
			}
		} else {
			// Sino, este será el valor predeterminado:
			$valor = "";
		}
	?>

	<form method="get">
		<label>Valor a buscar:</label>
		<input type="text" name="txtValor" value="<?php echo $valor ?>">
		<input type="submit" value="Buscar">
	</form>
	<br>

	<table border=1>
		<tr>
			<th>Código</th>
			<th>Descripción</th>
			<th>Categoría</th>
			<th>Precio S/.</th>
		</tr>

	<?php
		foreach ($tabla as $registro) {
	?>

		<tr>
			<td><?php echo $registro["id"]; ?></td>
			<td><?php echo $registro["descripcion"]; ?></td>
			<td><?php echo $registro["categoria"]; ?></td>
			<td><?php echo $registro["precio"]; ?></td>
			<td><a href="<?php echo 'editar_producto.php?codProd='.$registro['id']; ?>">Editar</a></td>
			<td><a href="javascript:confirmar('eliminar_producto.php?codProd=<?php echo $registro["id"]; ?>')">Eliminar</a></td>
		</tr>

	<?php
		}
	?>

	</table>
</body>
</html>
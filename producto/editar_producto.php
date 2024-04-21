<!DOCTYPE html>
<html lang="es-PE">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Editar producto</title>
</head>
<body>
	<h1>Editar Producto</h1><br>
	
	<?php
		if (isset($_GET["codProd"])) {
			$id = $_GET["codProd"];

			// Conectamos a la BD:
			require_once "../config/conexion.php";

			// Preparamos la sentencia SQL:
			$sentencia = $cnx->prepare("SELECT * FROM producto WHERE id=:codP;");

			// Pasamos los parámetros SQL:
			$sentencia->bindvalue(":codP", $id);

			// Ejecutamos la sentencia SQL:
			$sentencia->execute();

			// Sabemos que es una sola fila, así que la recojemos:
			$fila = $sentencia->fetch();

			// Guardamos los demas campos:
			$descripcion = $fila["descripcion"];
			$categoria = $fila["categoria"];
			$precio = $fila["precio"];
			
		} elseif (isset($_GET["txtID"])) {
			$id = $_GET["txtID"];
			$descripcion = $_GET["txtDescripcion"];
			$categoria = $_GET["lstCategoria"];
			$precio = $_GET["txtPrecio"];

			// Conectamos con la BD:
			require_once "../config/conexion.php";

			// Preparamos la sentencia SQL:
			$sentencia = $cnx->prepare("UPDATE producto SET descripcion=:descr, categoria=:categ, precio=:precio WHERE id=:codPrd;");

			// Pasamos los parámetros SQL:
			$sentencia->bindvalue(":codPrd", $id);
			$sentencia->bindvalue(":descr", $descripcion);
			$sentencia->bindvalue(":categ", $categoria);
			$sentencia->bindvalue(":precio", $precio);

			// Ejecutamos la sentencia SQL:
			$sentencia->execute();

			echo "<h3>Producto Actualizado</h3><br>";

		} else {
			$id = 0;
			$descripcion = "";
			$categoria = "";
			$precio = 0.0;
		}
		
	?>
	
	<form>
		<table>
			<tr>
				<td><label>Código:</label></td>
				<td><input type="text" name="txtID" size="6" value=<?php echo $id ?> readonly></td>
			</tr>
				<!-- Se pone 'name' a las etiquetas que enviaré. -->
			<tr>
				<td><label>Descripción:</label></td>
				<td><input type="text" name="txtDescripcion" size="50" value="<?php echo $descripcion ?>"></td>
			</tr>

			<tr>
				<td><label>Categoría:</label></td>
				<td>
					<select name="lstCategoria">
						<?php
							// Conectamos con la BD:
							require_once "../config/conexion.php";

							// Preparamos la sentencia SQL:
							$sentencia = $cnx->prepare("SELECT DISTINCT categoria FROM producto;");

							// Ejecutamos la sentencia SQL:
							$sentencia->execute();

							// Guardamos los valores:
							$columna = $sentencia->fetchAll();

							foreach ($columna as $e) {
						?>

						<option value="<?php echo $e['categoria'] ?>"
							<?php echo ($categoria==$e["categoria"]) ? "selected":""; ?>
							><?php echo $e["categoria"] ?></option>

						<?php
							}
						?>
					</select>
				</td>
			</tr>

			<tr>
				<td><label>Precio (S/.):</label></td>
				<td><input type="text" name="txtPrecio" size="12" value=<?php echo $precio ?>></td>
			</tr>

			<tr>
				<td><a href="index.php">Retornar</a></td>
				<td><input type="submit" value="Guardar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
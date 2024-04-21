<!DOCTYPE html>
<html lang="es-PE">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Agregar nuevo producto</title>
</head>
<body>
	<h1>Nuevo Producto</h1><br>

	<?php
		if (isset($_GET["txtID"])) {
			$id = $_GET["txtID"];
			$descripcion = $_GET["txtDescripcion"];
			$categoria = $_GET["lstCategoria"];
			$precio = $_GET["txtPrecio"];

			if ($id==0) {
				// Insertar el nuevo Producto //
				// Conectamos con la BD:
				require_once "../config/conexion.php";

				// Preparamos la sentencia SQL:
				$sentencia = $cnx->prepare("INSERT INTO producto (descripcion, categoria, precio) values (:descripcion, :categoria, :precio);");

				// Pasamos los parámetros SQL:
				$sentencia->bindvalue(":descripcion", $descripcion);
				$sentencia->bindvalue(":categoria", $categoria);
				$sentencia->bindvalue(":precio", $precio);

				// Ejecutamos la sentencia SQL:
				$sentencia->execute();


				// Recuperar el ID del nuevo producto //

				// Preparamos otra sentencia SQL:
				$sentencia = $cnx->prepare("SELECT max(id) as nuevoID FROM producto;");

				// Ejecutamos la sentencia SQL:
				$sentencia->execute();

				// Sabemos que es una sola fila, así que la recojemos:
				$fila = $sentencia->fetch();

				// Guardamos el nuevo ID:
				$id = $fila["nuevoID"];
			}
			
		} else {
			// Inicializamos las variables:
			$id = 0;
			$descripcion = "";
			$categoria = "";
			$precio = 0.0;
		}
	?>

	<a href="agregar_producto.php">Nuevo</a><br>

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
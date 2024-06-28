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
			$codigo = $_GET["txtCodInv"];
			$descripcion = $_GET["txtDescripcion"];
			$categoria = $_GET["lstCategoria"];
			$precio = $_GET["txtPrecio"];
			$stock = 0;

			if ($id==0) {
				// Insertar el nuevo Producto //
				// Conectamos con la BD:
				require_once "../config/conexion.php";

				// Preparamos la sentencia SQL:
				$sentencia = $cnx->prepare("INSERT INTO Producto (Codigo_inventario, Descripcion, Categoria, Precio, Stock) values (:codigo, :descripcion, :categoria, :precio, :stock);");

				// Pasamos los parámetros SQL:
				$sentencia->bindvalue(":codigo", $codigo);
				$sentencia->bindvalue(":descripcion", $descripcion);
				$sentencia->bindvalue(":categoria", $categoria);
				$sentencia->bindvalue(":precio", $precio);
				$sentencia->bindvalue(":stock", $stock);

				// Ejecutamos la sentencia SQL:
				$sentencia->execute();

				// Recuperar el ID del nuevo producto //

				// Preparamos otra sentencia SQL:
				$sentencia = $cnx->prepare("SELECT max(id) as nuevoID FROM Producto;");

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
			$codigo = "";
			$descripcion = "";
			$categoria = "";
			$precio = 0.0;
			$stock = 0;
		}
	?>

	<a href="agregar_producto.php">Nuevo</a>
	
	<br>

	<form border>
		<table>
			<tr>
				<td><label>ID:</label></td>
				<td><input type="text" name="txtID" size="6" value=<?php echo $id ?> readonly></td>
			</tr>
			<!-- Se pone 'name' a las etiquetas que enviaré. -->
			<tr>
				<td><label>Código de inventario:</label></td>
				<td><input type="text" name="txtCodInv" size="40" value="<?php echo $codigo ?>"></td>
			</tr>
			<tr>
				<td><label>Descripción:</label></td>
				<td><input type="text" name="txtDescripcion" size="40" value="<?php echo $descripcion ?>"></td>
			</tr>

			<tr>
				<td><label>Categoría:</label></td>
				<td>
					<select name="lstCategoria">
						<option selected>Seleccione una categoria...</option>
						<?php
							// Conectamos con la BD:
							require_once "../config/conexion.php";

							// Preparamos la sentencia SQL:
							$sentencia = $cnx->prepare("SELECT DISTINCT * FROM Categoria");

							// Ejecutamos la sentencia SQL:
							$sentencia->execute();

							// Guardamos los valores:
							$categorias = $sentencia->fetchAll();
							
							// Mostramos los valores
							for ($i=1; $i <= sizeof($categorias); $i++) {
						?>
						<option value="<?php echo $categorias[i-1]["ID_Categoria"] ?>">
							<?php echo $categorias[i-1]["Nombre"] ?>
						</option>
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
				<td><label>Stock:</label></td>
				<td><input type="text" name="txtStock" size="40" value="<?php echo $stock ?>"></td>
			</tr>

			<tr>
				<td><a href="index.php">Retornar</a></td>
				<td><input type="submit" value="Guardar"></td>
			</tr>
		</table>
	</form>
</body>
</html>
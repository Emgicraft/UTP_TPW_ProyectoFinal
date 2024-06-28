<!DOCTYPE html>
<html lang="es-PE">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<title>Cliente</title>
	<script type="text/javascript">
		function confirmar(ruta) {
			var r = confirm("¿Está seguro que desea continuar?");
			parent.location = r ? ruta : "";
		}
	</script>
</head>
<body>
	<header>
		<h1><i class='bx bxs-user'></i>Cliente</h1>
	</header>

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
			if (strlen($valor)>=2) {
				// Incluir un archivo PHP:
				require_once "../config/conexion.php";

				// Preparar la sentencia SQL:
				switch ($filtro) {
					case 'id':
						$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE ID_Cliente LIKE CONCAT('%', :vlr, '%');"); break;
					case 'nombre':
						$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE Nombre LIKE CONCAT('%', :vlr, '%');"); break;
					case 'numruc':
						$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE NumRuc LIKE CONCAT('%', :vlr, '%');"); break;
					case 'direccion':
						$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE Direccion LIKE CONCAT('%', :vlr, '%');"); break;
					case 'telefono':
						$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE Telefono LIKE CONCAT('%', :vlr, '%');"); break;
					default:
						$sentencia = $cnx->prepare("SELECT * FROM Cliente WHERE Nombre LIKE CONCAT('%', :vlr, '%');"); break;
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
	<main>
		<div class="contenedor">
			<form> <!-- Por defecto es: method="get" -->
				<label>Elija el campo y el valor a buscar:</label>
				<div>
					<select name="lstCabecera" required>
						<!-- <option hidden selected>Selecciona una opción...</option> -->
						<option value="id">Por ID</option>
						<option value="nombre" selected>Por nombre</option> <!--Default -->
						<option value="numruc">Por RUC</option>
						<option value="direccion">Por dirección</option>
						<option value="telefono">Por teléfono</option>
					</select>
					<input type="text" name="txtValor" value="<?php echo $valor ?>">
					<button type="submit"><i class='bx bx-search-alt'></i></button>
				</div>
			</form>

			<table>
				<tr>
					<th>ID</th>
					<th>Nombre</th>
					<th>RUC</th>
					<th>Dirección</th>
					<th>Teléfono</th>
					<th>Botones</th>
				</tr>

				<?php
					foreach ($tabla as $registro) {
				?>

				<tr>
					<td><?php echo $registro["ID_Cliente"]; ?></td>
					<td><?php echo $registro["Nombre"]; ?></td>
					<td><?php echo $registro["NumRuc"]; ?></td>
					<td><?php echo $registro["Direccion"]; ?></td>
					<td><?php echo $registro["Telefono"]; ?></td>
					<td>
						<a href="<?php echo 'editar_cliente.php?codCliente='.$registro['ID_Cliente']; ?>"><div class="contenedor__enlaces">Editar</div></a>
						<a href="javascript:confirmar('eliminar_cliente.php?codCliente=<?php echo $registro["ID_Cliente"]; ?>')"><div class="contenedor__enlaces">Eliminar</div></a>
					</td>
				</tr>

				<?php
					}
				?>
			</table>
		</div>
		<div class="contenedor">
			<a href="..\"><div class="contenedor__enlaces">Retornar</div></a>
			<a href="agregar_cliente.php"><div class="contenedor__enlaces">Agregar un nuevo cliente</div></a>
		</div>
	</main>
</body>
</html>
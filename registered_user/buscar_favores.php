<div style="margin-left: 8%; padding-top: 64px; padding-bottom: 2.8%;"> <!-- Filtrar por titulo, categoria, ciudad. Ordenar por pocas postulaciones. No se deben borrar los campos del filtro. -->
	<form action="./mostrar_favores.php" target="mostrarfavores" method="post">
		<label for="titulo">Titulo: </label>
		<input name="titulo" type="text"></input>
		<label for="categoria">Categoria: </label>
		<select name="categoria">
			<option value="">Todas</option>
			<?php
				include_once ('../db/connect.php');
				$link = conectar();
				$result = mysqli_query ($link, "SELECT * FROM categoria");
				while ($row = mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $row["id"]; ?>"><?php echo $row["nombre"]; ?></option>
				<?php
				}
				mysqli_free_result($result);
				mysqli_close($link);
			?>
		</select>
		<label for="localidad">Localidad: </label>
		<select name="localidad" id="localidad">
			<option value="">Todas</option>
				<?php
					include_once ("../db/connect.php");
					$link = conectar();
					$result = mysqli_query ($link, "SELECT localidad FROM localidades ORDER BY localidad");
					while ($row = mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $row["localidad"]; ?>"><?php echo $row["localidad"];?></option>
				<?php
				}
					mysqli_free_result($result);
					mysqli_close($link);
				?>		
		</select>
		<label for="orden">Ordenar por: </label>
		<select name="orden" id="orden">
			<option value="">Fecha Limite</option>
			<option value="titulo">Titulo</option>
			<option value="ciudad">Localidad</option>
			<option value="2">Postulantes</option>
			<option value="3">Categoria</option>
		</select>
		<label>&nbsp;&nbsp;&nbsp;</label>
		<button class="w3-btn w3-round">Buscar</button>
	</form>
</div>
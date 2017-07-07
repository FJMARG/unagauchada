<div style="margin-left: 8%; padding-bottom: 1.5%;padding-top: 1.5%; position: fixed; background-color: white;"> <!-- Filtrar por titulo, categoria, ciudad. Ordenar por pocas postulaciones. No se deben borrar los campos del filtro. -->
	<form action="./favores.php" method="post">
		<label for="titulo">Titulo: </label>
		<input name="titulo" type="text" value="<?php if (isset ($_POST['titulo'])){ echo $_POST['titulo'];}?>"></input>
		<input name="owner" type="hidden" value="<?php if (isset ($_POST['owner'])){ echo $_POST['owner'];}elseif(isset ($_GET['owner'])){echo $_GET['owner'];}?>"></input>
		<label for="categoria">Categoria: </label>
		<select name="categoria" >
			<option value="" <?php if (isset ($_POST['categoria']) && ($_POST['categoria'] == '')){ echo 'selected="'.$_POST['categoria'].'"';}?>">Todas</option>
			<?php
				include_once ('../db/connect.php');
				$link = conectar();
				$result = mysqli_query ($link, "SELECT * FROM categoria");
				while ($row = mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $row["id"]; ?>" <?php if (isset ($_POST['categoria']) && ($_POST['categoria'] == $row['id'])){ echo 'selected="'.$_POST['categoria'].'"';}?>><?php echo $row["nombre"]; ?></option>
				<?php
				}
				mysqli_free_result($result);
				mysqli_close($link);
			?>
		</select>
		<label for="localidad">Localidad: </label>
		<select name="localidad" id="localidad">
			<option value="" <?php if (isset ($_POST['localidad']) && ($_POST['localidad'] == '')){ echo 'selected="'.$_POST['localidad'].'"';}?>>Todas</option>
				<?php
					include_once ("../db/connect.php");
					$link = conectar();
					$result = mysqli_query ($link, "SELECT localidad FROM localidades ORDER BY localidad");
					while ($row = mysqli_fetch_array($result)){ ?>
					<option value="<?php echo $row["localidad"]; ?>" <?php if (isset ($_POST['localidad']) && ($_POST['localidad'] == $row['localidad'])){ echo 'selected="'.$_POST['localidad'].'"';}?>><?php echo $row["localidad"];?></option>
				<?php
				}
					mysqli_free_result($result);
					mysqli_close($link);
				?>		
		</select>
		<label for="orden">Ordenar por: </label>
		<select name="orden" id="orden">
			<option value="" <?php if (isset ($_POST['orden']) && ($_POST['orden'] == '')){ echo 'selected="'.$_POST['orden'].'"';}?>>Fecha Limite</option>
			<option value="titulo" <?php if (isset ($_POST['orden']) && ($_POST['orden'] == 'titulo')){ echo 'selected="'.$_POST['orden'].'"';}?>>Titulo</option>
			<option value="ciudad" <?php if (isset ($_POST['orden']) && ($_POST['orden'] == 'ciudad')){ echo 'selected="'.$_POST['orden'].'"';}?>>Localidad</option>
			<option value="2" <?php if (isset ($_POST['orden']) && ($_POST['orden'] == '2')){ echo 'selected="'.$_POST['orden'].'"';}?>>Postulantes</option>
			<option value="3" <?php if (isset ($_POST['orden']) && ($_POST['orden'] == '3')){ echo 'selected="'.$_POST['orden'].'"';}?>>Categoria</option>
		</select>
		<label>&nbsp;&nbsp;&nbsp;</label>
		<button class="w3-btn w3-round">Buscar</button>
	</form>
</div>
<hr style="position: fixed; background-color: orange; width: 100%; height: 1px; margin-top: 5.5%">
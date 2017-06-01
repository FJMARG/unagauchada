<?php
$index = 0;
if (mysqli_num_rows($result)!=0){
while ($array = mysqli_fetch_array($result)){?>
	<div class="w3-panel w3-round w3-card w3-grey">
		<font size=4 face="arial">
			<center>
				<h2> <?php echo $array['titulo']; ?></h3>
				<img class="w3-round-large" src='/image/favor/<?php echo "$array[foto]"; ?>' width="300" height="300"/>
				<br>
				<br>
			</center>
			<script language= "javascript" src="../js/verDetallesFavor.js"></script>
			<div id="datos<?php echo $index; ?>" style="display:none">
				<center>
				Dueño : &nbsp;&nbsp; 
				<?php
					include_once ('../db/connect.php');
					$link1 = conectar();
					$result2 = mysqli_query ($link1, "SELECT * FROM usuario WHERE id = '$array[id_usuario]'");
					$arreglo = mysqli_fetch_array($result2);
        			echo $arreglo['nombre']." ".$arreglo['apellido'];
					/* Categoria: */
					$result2 = mysqli_query ($link1, "SELECT * FROM categoria WHERE id = '$array[id_categoria]'");
					$arreglo = mysqli_fetch_array($result2);
      			?>
				<br>
				Categoria:&nbsp;&nbsp; <?php echo $arreglo['nombre']; mysqli_close($link1); ?>
				<br>
				Fecha Limite :&nbsp;&nbsp; <?php echo $array['fechalimite']; ?>
				<br>
				Descripcion :&nbsp;&nbsp;
				<font size="3"><i><center><?php echo $array['descripcion']; ?></i></center></font>
				<br>
				Ciudad :&nbsp;&nbsp;<?php echo $array['ciudad']; ?>
				<br>
				<?php 
				if($_SESSION['id'] == $array['id_usuario'] )
				{?>
				<br>
				<a href="ver_mis_favores.php" class="w3-btn w3-round">Mis Favores.</a>
				</center>
				<?php 
				}?>
			<br>
			</div>
			<center>
			<a href="#" onclick="verDetalles(<?php echo $index; ?>)" class="w3-btn w3-round" id="link<?php echo $index; ?>">Mostrar m&aacute;s.
			</a><br>
		</font><br>
	</div>
	<br>
	<br>
<?php
	$index = $index + 1;
}
}
else{ ?>
	<br>
	<br>
<?php
	echo "Aun no se han publicado favores o no existen favores que contengan las palabras claves ingresadas.";
}
?>
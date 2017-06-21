<?php
$index = 0;
if (mysqli_num_rows($result)!=0){
while ($array = mysqli_fetch_array($result)){?>
	<div class="w3-panel w3-border w3-border-orange w3-round-large">
		<font size=4 face="arial">
			<center>
				<h2> <?php echo $array['titulo']; ?></h3>
				<img class="w3-round" src='/image/favor/<?php echo "$array[foto]"; ?>' width="300" height="300"/>
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
				?>
				<a href="ver_perfil.php?id=<?php echo $array['id_usuario']?>"><?php echo $arreglo['nombre']." ".$arreglo['apellido'];?> </a>
				<?php
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
				<font size="3"><i><?php echo $array['descripcion']; ?></i></font>
				<br>
				Localidad :&nbsp;&nbsp;<?php echo $array['ciudad']; ?>
				<br>
				<br>
				<!-- BOTON PARA HACER PREGUNTAS -->
				<?php if($array['id_usuario'] != $_SESSION['id']){ ?>
				<a href="preguntas.php?id=<?php echo $array['id']; ?>" class="w3-btn w3-round"> Hacer Pregunta.</a>
				<br>
				<br>
				<!-- BOTON PARA POSTULARSE -->
				<a href="postularse.php?id=<?php echo $array['id']; ?>" class="w3-btn w3-round"> Postularse.</a>
				<br>
				<br>
				<!-- BOTON PARA VER PREGUNTAS -->
				<?php } else{ ?>
				<a href="preguntas.php?id=<?php echo $array['id']; ?>" class="w3-btn w3-round"> Ver Preguntas.</a>
				<br>
				<br>
				<?php } ?>
			</div>
			<center>
			<a href="#" onclick="verDetalles(<?php echo $index; ?>,event)" class="w3-btn w3-round" id="link<?php echo $index; ?>">Mostrar m&aacute;s.
			</a></center>
		</font><br>
	</div><br>
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
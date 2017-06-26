<?php
	include_once("../db/connect.php");
	$link = conectar();
	$index = 0;
	$result = mysqli_query($link ,"SELECT * from postula where favores.id_usuario = '$_SESSION[id]'");
	if (mysqli_num_rows($result)!=0){
		while ($array1 = mysqli_fetch_array($result)){?>
				<?php 
					$postulantes = mysqli_query($link ,"SELECT * from postula where postula.id_favor = '$array1[id]'");
					if (mysqli_num_rows($postulantes)!=0){
						while ($array2 = mysqli_fetch_array($postulantes)){
							$usuario = mysqli_query($link ,"SELECT * From usuario where usuario.id = '$array2[id]'");
							?>
							<div class="w3-panel w3-border w3-border-orange w3-round-large">
								<p>Postulante: <?php echo $usuario['nombre']; ?></p>
								<p>Titulo de gauchada: <?php echo $array1['titulo']; ?></p>

<?php
}}}}
else
	echo "Aun no tienes favores";
?>
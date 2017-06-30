<?php 	
	if($datos['puntaje'] < 0){
		$rango = 'Irresponsable';
	}elseif ($datos['puntaje'] == 0){
		$rango = 'Observador';
	}elseif ($datos['puntaje'] == 1){
		$rango = 'Buen Tipo';
	}elseif (($datos['puntaje'] > 1)and($datos['puntaje'] <= 5)){
		$rango = 'Gran Tipo';
	}elseif (($datos['puntaje'] > 5)and($datos['puntaje'] <= 10)){
		$rango = 'Tipazo';
	}elseif (($datos['puntaje'] > 10)and($datos['puntaje'] <= 20)){
		$rango = 'Heroe';
	}elseif (($datos['puntaje'] > 20)and($datos['puntaje'] <= 50)){
		$rango = 'Nobleza Gaucha';
	}elseif($datos['puntaje'] > 50){
		$rango = 'Dios';
	}
		echo " (".$rango.")";  
?>
<?php
include_once ('classSession.php');
$cerrarsesion = new Autenticacion ();
if ($cerrarsesion->logout() == true)
	header("Location: ../index.php");
?>
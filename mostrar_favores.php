<?php
include_once ('../db/connect.php');
$link = conectar();
$result = mysqli_query($link, "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1)");
mysqli_close($link);
include_once("print_favores.php");
?>
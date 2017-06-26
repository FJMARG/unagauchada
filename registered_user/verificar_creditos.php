<?php
function tieneCreditos(){
	$link = conectar();
	$result = mysqli_query($link, "SELECT cantidad FROM credito WHERE id_usuario='$_SESSION[id]'");
	$array = mysqli_fetch_array($result);
	mysqli_close($link);
	if ($array['cantidad'] == 0)
		return false;
	else
		return true;
}
?>
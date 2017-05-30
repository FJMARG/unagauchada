<!--
Si pasan 5 minutos de inactividad se cierra la sesion.
En el if se plantea((0 < (24*60*60 - ($segssesion - $segsactual)) and ((24*60*60 - ($segssesion - $segsactual) < (24*60*60))))))
Porque los resultados pueden dar negativos.
En resumen 0<X<24*60*60, donde X=24*60*60 - ($segssesion - $segsactual).
-->

<?php
include_once ('classSession.php');
$verificar = new Autenticacion();
if ($verificar->estado() == true)
	header ("Location: ../index.php");
?>
<!-- 
Redireccionar a una pagina: header ("Location: pag.php");
 -->
<?php

include_once ('classSession.php');
$verificar = new Autenticacion();
$verificar->email = $_POST['email']; 
$verificar->contraseña = $_POST['pass'];
$verificar->consultadatos();
$info = $verificar->check();


if($info == 'ok'){ ?>
<script type="text/javascript">
 window.parent.location = "../registered_user/favores.php";
</script>
<?php	
}
else {
if ($info == 1){
	header ("Location: ../index.php?error=1");
	}
}
?>
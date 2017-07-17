<div class="w3-main" style="margin-left:350px; margin-top:3%; padding-top:3%">
<div style="margin-right:350px">
<div class="w3-padding-64">
<div class="w3-container">
<div class="w3-row-padding">
	<!-- -------------------------------------- Importa los CSS ---------------------------------------- -->
	<link rel="stylesheet" href="/css/w3.css">
	<link rel="stylesheet" href="/css/w3-theme-black.css">
	<!-- ----------------------------------------------------------------------------------------------- -->
<?php
include_once("../session/verifySession.php");
include_once ('../db/connect.php');
$link = conectar();

/* Impresiones para debuggear.

echo "<p>Orden: Esta vacio: ".empty($_POST['orden']).". Esta seteado: ".isset($_POST['orden']).". Valor: ".$_POST['orden'].".</p>";
echo "<p>Titulo: Esta vacio: ".empty($_POST['titulo']).". Esta seteado: ".isset($_POST['titulo'])." Valor: ".$_POST['titulo'].".</p>";
echo "<p>Localidad: Esta vacio: ".empty($_POST['localidad']).". Esta seteado: ".isset($_POST['localidad']).". Valor: ".$_POST['localidad'].".</p>";
echo "<p>Categoria: Esta vacio: ".empty($_POST['categoria']).". Esta seteado: ".isset($_POST['categoria']).". Valor: ".$_POST['categoria'].".</p>";

*/



if ((isset($_GET['owner']) && ($_GET['owner'] == "yes")) || (isset($_POST['owner']) && ($_POST['owner'] == "yes"))){
	if ((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
		switch ($_POST['orden']){
			case "titulo":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY titulo";
				break;
			case "ciudad":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY ciudad";
				break;
			case 2:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.id_categoria = '$_POST[categoria]' AND favor.ciudad = '$_POST[localidad]' GROUP BY favor.id ORDER BY cant";
				break;
			case 3:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.id_categoria = '$_POST[categoria]' AND favor.ciudad = '$_POST[localidad]' ORDER BY categoria.nombre ";
				break;
		}
		$preguntas= "&o=".$_POST['orden']."&cat=".$_POST['categoria']."&loc=".$_POST['localidad']."&tit=".$_POST['titulo'];
	}
	elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad']))){
		$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY fechalimite";
		$preguntas= "&tit=".$_POST['titulo']."&cat=".$_POST['categoria']."&loc=".$_POST['localidad'];
	}
	elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
		switch ($_POST['orden']){
			case "titulo":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' ORDER BY titulo";
				break;
			case "ciudad":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' ORDER BY ciudad";
				break;
			case 2:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.id_categoria = '$_POST[categoria]' GROUP BY favor.id ORDER BY cant";
				break;
			case 3:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.id_categoria = '$_POST[categoria]' ORDER BY categoria.nombre ";
				break;
		}
		$preguntas= "&o=".$_POST['orden']."&cat=".$_POST['categoria']."&tit=".$_POST['titulo'];
	}
	elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['categoria'])) AND !(empty($_POST['categoria']))){
		$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria] ORDER BY fechalimite'";
		$preguntas= "&cat=".$_POST['categoria']."&tit=".$_POST['categoria'];
	}
	elseif ((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
		switch ($_POST['orden']){
			case "titulo":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' AND ciudad = '$_POST[localidad]' ORDER BY titulo";
				break;
			case "ciudad":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' AND ciudad = '$_POST[localidad]' ORDER BY ciudad";
				break;
			case 2:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.ciudad = '$_POST[localidad]' GROUP BY favor.id ORDER BY cant";
				break;
			case 3:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.ciudad = '$_POST[localidad]' ORDER BY categoria.nombre ";
				break;
		}
		$preguntas= "&o=".$_POST['orden']."&tit=".$_POST['titulo']."&loc=".$_POST['localidad'];
	}
	elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad']))){
		$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' AND ciudad = '$_POST[localidad]' ORDER BY fechalimite";
		$preguntas= "&tit=".$_POST['titulo']."&loc=".$_POST['localidad'];
	}
	elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
		switch ($_POST['orden']){
			case "titulo":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' ORDER BY titulo";
				break;
			case "ciudad":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' ORDER BY ciudad";
				break;
			case 2:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.titulo LIKE '%$_POST[titulo]%' GROUP BY favor.id ORDER BY cant";
				break;
			case 3:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.titulo LIKE '%$_POST[titulo]%' ORDER BY categoria.nombre ";
				break;
		}
		$preguntas= "&o=".$_POST['orden']."&tit=".$_POST['titulo'];
	}
	elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo']))){
		$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND titulo LIKE '%$_POST[titulo]%' ORDER BY fechalimite";
		$preguntas= "&tit=".$_POST['titulo'];
	}
	elseif((isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
		switch ($_POST['orden']){
			case "titulo":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY titulo";
				break;
			case "ciudad":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY ciudad";
				break;
			case 2:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.id_categoria = '$_POST[categoria]' AND favor.ciudad = '$_POST[localidad]' GROUP BY favor.id ORDER BY cant";
				break;
			case 3:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.id_categoria = '$_POST[categoria]' AND favor.ciudad = '$_POST[localidad]' ORDER BY categoria.nombre ";
				break;
		}
		$preguntas= "&o=".$_POST['orden']."&cat=".$_POST['categoria']."&loc=".$_POST['localidad'];
	}
	elseif((isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad']))){
		$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY fechalimite";
		$preguntas= "&loc=".$_POST['localidad']."&cat=".$_POST['categoria'];
	}
	elseif((isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
		switch ($_POST['orden']){
			case "titulo":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND id_categoria = '$_POST[categoria]' ORDER BY titulo";
				break;
			case "ciudad":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND id_categoria = '$_POST[categoria]' ORDER BY ciudad";
				break;
			case 2:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.id_categoria = '$_POST[categoria]' GROUP BY favor.id ORDER BY cant";
				break;
			case 3:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.id_categoria = '$_POST[categoria]' ORDER BY categoria.nombre ";
				break;
		}
		$preguntas= "&o=".$_POST['orden']."&cat=".$_POST['categoria'];
	}
	elseif((isset ($_POST['categoria'])) AND !(empty($_POST['categoria']))){
		$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND id_categoria = '$_POST[categoria]' ORDER BY fechalimite";
		$preguntas= "&cat=".$_POST['categoria'];
	}
	elseif((isset ($_POST['localidad'])) AND !(empty($_POST['localidad'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
		switch ($_POST['orden']){
			case "titulo":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND ciudad = '$_POST[localidad]' ORDER BY titulo";
				break;
			case "ciudad":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND ciudad = '$_POST[localidad]' ORDER BY ciudad";
				break;
			case 2:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.ciudad = '$_POST[localidad]' GROUP BY favor.id ORDER BY cant";
				break;
			case 3:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (favor.id_usuario = '$_SESSION[id]') AND favor.ciudad = '$_POST[localidad]' ORDER BY categoria.nombre ";
				break;
		}
		$preguntas= "&o=".$_POST['orden']."&loc=".$_POST['localidad'];
	}
	elseif((isset ($_POST['localidad'])) AND !(empty($_POST['localidad']))){
		$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') AND ciudad = '$_POST[localidad]' ORDER BY fechalimite";
		$preguntas= "&loc=".$_POST['localidad'];
	}
	elseif((isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
		switch ($_POST['orden']){
			case "titulo":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') ORDER BY titulo";
				break;
			case "ciudad":
				$consulta= "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') ORDER BY ciudad";
				break;
			case 2:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (favor.id_usuario = '$_SESSION[id]') GROUP BY favor.id ORDER BY cant ";
				break;
			case 3:
				$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (favor.id_usuario = '$_SESSION[id]') ORDER BY categoria.nombre ";
				break;
		}
		$preguntas= "&o=".$_POST['orden'];
	}
	else{
		$consulta = "SELECT * FROM favor WHERE (id_usuario = '$_SESSION[id]') ORDER BY fechalimite";
		$preguntas= "";
	}
	$preguntas=$preguntas."&owner=yes";
}
else {
if ((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
	switch ($_POST['orden']){
		case "titulo":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY titulo";
			break;
		case "ciudad":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY ciudad";
			break;
		case 2:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.id_categoria = '$_POST[categoria]' AND favor.ciudad = '$_POST[localidad]' GROUP BY favor.id ORDER BY cant";
			break;
		case 3:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.id_categoria = '$_POST[categoria]' AND favor.ciudad = '$_POST[localidad]' ORDER BY categoria.nombre ";
			break;
	}
	$preguntas= "&o=".$_POST['orden']."&cat=".$_POST['categoria']."&loc=".$_POST['localidad']."&tit=".$_POST['titulo'];
}
elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad']))){
	$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY fechalimite";	
	$preguntas= "&tit=".$_POST['titulo']."&cat=".$_POST['categoria']."&loc=".$_POST['localidad'];
}
elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
	switch ($_POST['orden']){
		case "titulo":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' ORDER BY titulo";
			break;
		case "ciudad":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria]' ORDER BY ciudad";
			break;
		case 2:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.id_categoria = '$_POST[categoria]' GROUP BY favor.id ORDER BY cant";
			break;
		case 3:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.id_categoria = '$_POST[categoria]' ORDER BY categoria.nombre ";
			break;
	}
	$preguntas= "&o=".$_POST['orden']."&cat=".$_POST['categoria']."&tit=".$_POST['titulo'];
}
elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['categoria'])) AND !(empty($_POST['categoria']))){
	$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' AND id_categoria = '$_POST[categoria] ORDER BY fechalimite'";
	$preguntas= "&cat=".$_POST['categoria']."&tit=".$_POST['titulo'];
}
elseif ((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
	switch ($_POST['orden']){
		case "titulo":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' AND ciudad = '$_POST[localidad]' ORDER BY titulo";
			break;
		case "ciudad":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' AND ciudad = '$_POST[localidad]' ORDER BY ciudad";
			break;
		case 2:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.ciudad = '$_POST[localidad]' GROUP BY favor.id ORDER BY cant";
			break;
		case 3:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.titulo LIKE '%$_POST[titulo]%' AND favor.ciudad = '$_POST[localidad]' ORDER BY categoria.nombre ";
			break;
	}
	$preguntas= "&o=".$_POST['orden']."&tit=".$_POST['titulo']."&loc=".$_POST['localidad'];
}
elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad']))){
	$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' AND ciudad = '$_POST[localidad]' ORDER BY fechalimite";
	$preguntas= "&tit=".$_POST['titulo']."&loc=".$_POST['localidad'];
}
elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
	switch ($_POST['orden']){
		case "titulo":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' ORDER BY titulo";
			break;
		case "ciudad":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' ORDER BY ciudad";
			break;
		case 2:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.titulo LIKE '%$_POST[titulo]%' GROUP BY favor.id ORDER BY cant";
			break;
		case 3:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.titulo LIKE '%$_POST[titulo]%' ORDER BY categoria.nombre ";
			break;
	}
	$preguntas= "&o=".$_POST['orden']."&tit=".$_POST['titulo'];
}
elseif((isset ($_POST['titulo'])) AND !(empty($_POST['titulo']))){
	$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND titulo LIKE '%$_POST[titulo]%' ORDER BY fechalimite";
	$preguntas= "&tit=".$_POST['titulo'];
}
elseif((isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
	switch ($_POST['orden']){
		case "titulo":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY titulo";
			break;
		case "ciudad":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY ciudad";
			break;
		case 2:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.id_categoria = '$_POST[categoria]' AND favor.ciudad = '$_POST[localidad]' GROUP BY favor.id ORDER BY cant";
			break;
		case 3:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.id_categoria = '$_POST[categoria]' AND favor.ciudad = '$_POST[localidad]' ORDER BY categoria.nombre ";
			break;
	}
	$preguntas= "&o=".$_POST['orden']."&cat=".$_POST['categoria']."&loc=".$_POST['localidad'];
}
elseif((isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['localidad'])) AND !(empty($_POST['localidad']))){
	$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND id_categoria = '$_POST[categoria]' AND ciudad = '$_POST[localidad]' ORDER BY fechalimite";
	$preguntas= "&loc=".$_POST['localidad']."&cat=".$_POST['categoria'];
}
elseif((isset ($_POST['categoria'])) AND !(empty($_POST['categoria'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
	switch ($_POST['orden']){
		case "titulo":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND id_categoria = '$_POST[categoria]' ORDER BY titulo";
			break;
		case "ciudad":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND id_categoria = '$_POST[categoria]' ORDER BY ciudad";
			break;
		case 2:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.id_categoria = '$_POST[categoria]' GROUP BY favor.id ORDER BY cant";
			break;
		case 3:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.id_categoria = '$_POST[categoria]' ORDER BY categoria.nombre ";
			break;
	}
	$preguntas= "&o=".$_POST['orden']."&cat=".$_POST['categoria'];
}
elseif((isset ($_POST['categoria'])) AND !(empty($_POST['categoria']))){
	$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND id_categoria = '$_POST[categoria]' ORDER BY fechalimite";	
	$preguntas= "&cat=".$_POST['categoria'];
}
elseif((isset ($_POST['localidad'])) AND !(empty($_POST['localidad'])) AND (isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
	switch ($_POST['orden']){
		case "titulo":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND ciudad = '$_POST[localidad]' ORDER BY titulo";
			break;
		case "ciudad":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND ciudad = '$_POST[localidad]' ORDER BY ciudad";
			break;
		case 2:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.ciudad = '$_POST[localidad]' GROUP BY favor.id ORDER BY cant";
			break;
		case 3:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) AND favor.ciudad = '$_POST[localidad]' ORDER BY categoria.nombre ";
			break;
	}
	$preguntas= "&o=".$_POST['orden']."&loc=".$_POST['localidad'];
}
elseif((isset ($_POST['localidad'])) AND !(empty($_POST['localidad']))){
	$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) AND ciudad = '$_POST[localidad]' ORDER BY fechalimite";
	$preguntas= "&loc=".$_POST['localidad'];
}
elseif((isset ($_POST['orden'])) AND !(empty($_POST['orden']))){
	switch ($_POST['orden']){
		case "titulo":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) ORDER BY titulo";
			break;
		case "ciudad":
			$consulta= "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) ORDER BY ciudad";
			break;
		case 2:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, COUNT(postula.id_usuario) AS cant FROM favor LEFT JOIN postula ON (favor.id = postula.id_favor) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) GROUP BY favor.id ORDER BY cant ";
			break;
		case 3:
			$consulta= "SELECT favor.id, favor.titulo, favor.id_categoria, favor.descripcion, favor.ciudad, favor.foto, favor.fechalimite, favor.id_usuario, favor.activo, categoria.nombre FROM favor INNER JOIN categoria ON (favor.id_categoria = categoria.id) WHERE (CURDATE() <= favor.fechalimite) AND (favor.activo = 1) ORDER BY categoria.nombre ";
			break;
	}
	$preguntas= "&o=".$_POST['orden'];
}
else{
	$consulta = "SELECT * FROM favor WHERE (CURDATE() <= fechalimite) AND (activo = 1) ORDER BY fechalimite";
	$preguntas= "";
}

}

$result = mysqli_query($link, $consulta);

if (isset ($_GET['ok'])){
	if ($_GET['ok'] == "2"){
		echo "<p style='color: green;'>Eliminaste correctamente el favor y se te reembolso un credito.</p>";
	}
	elseif($_GET['ok'] == "3"){
		echo "<p style='color: green;'>Eliminaste correctamente el favor.</p>";
	}
	else{
		echo "<p style='color: green;'>Te has postulado correctamente.</p>";
	}
}

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
				<?php
					$result3 = mysqli_query($link,"SELECT calificacion, nombre, apellido FROM calificacion INNER JOIN (SELECT postula.id_usuario, usuario.nombre, usuario.apellido FROM postula INNER JOIN usuario ON (postula.id_usuario = usuario.id) WHERE postula.id_favor = '$array[id]' AND postula.elegido = 1) r ON (r.id_usuario = calificacion.id_usuario_r) WHERE calificacion.id_favor = '$array[id]'");
					$array3 = mysqli_fetch_array($result3);
					$result4 = mysqli_query($link,"SELECT postula.id_usuario, usuario.nombre, usuario.apellido FROM postula INNER JOIN usuario ON (postula.id_usuario = usuario.id) WHERE postula.id_favor = '$array[id]'");
					$array4 = mysqli_fetch_array($result4);
					if ($array ['activo'] == 0){
						if ($array3['calificacion'] == 1){
							echo "<a style='color:green;'>El favor fue cumplido correctamente.</a>";
							echo "<br><a style='color:green;'>Responsable: ".$array3['nombre']." ".$array3['apellido'].".</a>";
						}
						else {
							echo "<br><a style='color:Orange;'>Aun no calificaste a ".$array4['nombre']." ".$array4['apellido'].".</a>";
						}
					}
					else {
						$fechafavor = date_create($array['fechalimite']);
						$fechafavor = date_format($fechafavor, "Y-m-d");
						$fechaactual = date("Y-m-d");
						if ($fechafavor < $fechaactual)
							echo "<p style='color:red;'>El favor se ha vencido.</p>";
					}
				?>
				<br>
				<br>
			</center>
			<script language= "javascript" src="../js/verDetallesFavor.js"></script>
			<script language= "javascript" src="../js/validarBorradoFavor.js"></script>
			<div id="datos<?php echo $index; ?>" style="display:none">
				<center>
				Dueño : &nbsp;&nbsp; 
				<?php
					include_once ('../db/connect.php');
					$link1 = conectar();
					$result2 = mysqli_query ($link1, "SELECT * FROM usuario WHERE id = '$array[id_usuario]'");
					$arreglo = mysqli_fetch_array($result2);
				?>
				<a target="_blank" href="ver_perfil.php?id=<?php echo $array['id_usuario']?>"><?php echo $arreglo['nombre']." ".$arreglo['apellido'];?> </a>
				<?php
					/* Categoria: */
					$result2 = mysqli_query ($link1, "SELECT * FROM categoria WHERE id = '$array[id_categoria]'");
					$arreglo = mysqli_fetch_array($result2);
      			?>
				<br>
				Categoria:&nbsp;&nbsp; <?php echo $arreglo['nombre']; ?>
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
				<a href="preguntas.php?id=<?php echo $array['id'].$preguntas; ?>" class="w3-btn w3-round"> Hacer Pregunta.</a>
				<br>
				<br>
				<!-- BOTON PARA POSTULARSE -->
				<?php
					$resultado = mysqli_query($link1 ,"SELECT * FROM postula Where (postula.id_usuario = '$_SESSION[id]')AND (postula.id_favor = '$array[id]')");
					mysqli_close($link1);
					if (mysqli_num_rows($resultado)==0){ ?>
						<a href="./postularse.php?id=<?php echo $array['id'].$preguntas; ?>" class="w3-btn w3-round"> Postularse.</a>
						<br>
						<br>
				<!-- BOTON PARA VER PREGUNTAS -->
				<?php }} else{ ?>
				<a href="./preguntas.php?id=<?php echo $array['id'].$preguntas; ?>" class="w3-btn w3-round"> Ver Preguntas.</a>
				<br>
				<br>
				<?php 
					$resultado2 = mysqli_query($link1 ,"SELECT * FROM postula Where (postula.id_favor= '$array[id]')");
					if(mysqli_num_rows($resultado2)== 0){
				?>
				<a href="./modificar_favor.php?id=<?php echo $array['id'].$preguntas; ?>" class="w3-btn w3-round"> Modificar.</a>
				<br>
				<br>
				<?php }?>
				<a href="./borrar.php?id=<?php echo $array['id'].$preguntas; ?>" onclick="return confirmar();" class="w3-btn w3-round"> Borrar Favor.</a>
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
	echo "Aun no se han publicado favores o no existen favores que contengan los filtros ingresados.";
}
mysqli_close($link);
?>
				</div>
			</div>
		</div>
	</div>					
</div>
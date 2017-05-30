/* Esta funcion verifica si los campos estan vacios.  || (document.getElementById("foto").value.length == 0) en la condicion del if para incluir la validacion de la foto. */

function validar (){
	if ((document.getElementById("titulo").value.length == 0) || (document.getElementById("categoria").value.length == 0) || (document.getElementById("descripcion").value.length == 0) || (document.getElementById("fecha").value.length == 0) || (document.getElementById("ciudad").value.length == 0)){
		alert('No puede haber campos vacios.');
		return false;
	}
}
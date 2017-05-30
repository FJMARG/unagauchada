// Esta funcion verifica si los campos E-mail y Contraseña estan vacios.

function validar (){
	if ((document.getElementById("email").value.length == 0) || (document.getElementById("pass").value.length == 0)){
		alert('No puede haber campos vacios.');
		return false;
	}
}
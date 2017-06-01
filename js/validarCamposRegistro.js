// Esta funcion verifica si los campos estan vacios.

function validar (){
	if ((document.getElementById("fecha_nac").value.length == 0) || (document.getElementById("nombre").value.length == 0) || (document.getElementById("apellido").value.length == 0) || (document.getElementById("telefono").value.length == 0) || (document.getElementById("email").value.length == 0) || (document.getElementById("pw").value.length == 0) || (document.getElementById("cpw").value.length == 0)){
		alert('No puede haber campos vacios.');
		return false;
	}
	if ((document.getElementById("pw").value) != (document.getElementById("cpw").value)){
		alert('Las contrase\u00F1as no coinciden.');
		return false;
	}
	if ((document.getElementById("pw").value.length) < 6){
		alert('La contrase\u00F1a debe tener minimo una longitud de 6.');
		return false;
	}
}
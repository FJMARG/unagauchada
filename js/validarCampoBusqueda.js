function validarBusqueda(){
	if(document.getElementById("clave").value.length == 0){
		alert("Es necesario ingresar una palabra clave para hacer la busqueda avanzada.");
		return false;
	}
}

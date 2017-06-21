function validarPregunta(){
	if(document.getElementById("pregunta").value.length == 0){
		alert('No puede haber campos vacios.');
		return false;
	}
}
function validarPregunta(){
	if(document.getElementById("pregunta").value.length == 0){
		alert('Falta completar campo de texto');
		return false;
	}
}
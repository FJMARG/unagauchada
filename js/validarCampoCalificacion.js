function validarCalificacion(){
	if(document.getElementById("comentario").value.length == 0){
		alert('El campo de comentario es obligatorio.');
		return false;
	}
}
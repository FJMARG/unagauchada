function validarMod(){
		if((document.getElementById("titulo").value.length === 0) || (document.getElementById("categoria").value.length === 0) || (document.getElementById("descripcion").value.length === 0) || (document.getElementById("fecha") === 0) || (document.getElementById("ciudad") === 0)){
			alert('No puede haber campos vacios.');
			return false;
		}
}
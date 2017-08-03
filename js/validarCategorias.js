function validarAgregar(e){
	if ($("#categoria1").val().length == 0){
		alert("No puede haber campos vacios.");
		e.preventDefault();
	}
}

function validarEliminar(e){
	if (!confirm("¿Estas seguro que quieres eliminar esta categoria?")){
		e.preventDefault();
	}
}

function validarModificar(e){
	if ($("#categoria4").val().length == 0){
		alert("No puede haber campos vacios.");
		e.preventDefault();
	}
}
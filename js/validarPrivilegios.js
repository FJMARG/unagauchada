function validar(e){
	"use strict"
	var usuarios = document.getElementsByName("idusuario[]");
	var cant = 0;
	for (var i=0;i<usuarios.length;i++){
		if (usuarios[i].checked === true)
			cant++;
	}
	if (cant === 0){
		alert ("Debes seleccionar al menos un usuario para cambiarle los privilegios.")
		e.preventDefault();
	}
	else{
		if (!confirm("¿Estas seguro que quieres asignar los privilegios?")){
			e.preventDefault();
		}
	}
}
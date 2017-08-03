function rellenarCampos(){ /* para rellenar los campos del modificar reputacion*/ 
	"use strict";
	var datos=document.getElementById("nombrereputacion2").value;
	var array=datos.split("-");
	var id=array[0];
	var nombre=array[1];
	var puntajemin=array[2];
	var puntajemax=array[3];
	if (datos !== ""){
		document.getElementById("nombrereputacion3").value=nombre;
		document.getElementById("puntajemin2").value=puntajemin;
		document.getElementById("puntajemax2").value=puntajemax;
		document.getElementById("idreputacion").value=id;
	}
	else {
		document.getElementById("nombrereputacion3").value="";
		document.getElementById("puntajemin2").value="";
		document.getElementById("puntajemax2").value="";
		document.getElementById("idreputacion").value="";
	}
}

function validarCamposAgregar(e){
	"use strict";
	var nombre = document.getElementById("nombrereputacion").value;
	var puntajemin = document.getElementById("puntajemin").value;
	var puntajemax = document.getElementById("puntajemax").value;
	if ((nombre === "") || (puntajemin === "") || (puntajemax === "")){
		alert ("No pueden haber campos vacios.");
		e.preventDefault();
		return false;
	}
	else if (puntajemax < puntajemin){
		alert ("El puntaje maximo no debe ser menor al puntaje minimo.");
		e.preventDefault();
		return false;
	}
	else
		return true;
}

function validarCamposModificar(e){
		"use strict";
	var nombre = document.getElementById("nombrereputacion3").value;
	var puntajemin = document.getElementById("puntajemin2").value;
	var puntajemax = document.getElementById("puntajemax2").value;
	var id = document.getElementById("idreputacion").value;
	if (id === ""){
		alert ("Debe seleccionar una categoria para modificar.");
		e.preventDefault();
		return false;
	}
	else if ((nombre === "") || (puntajemin === "") || (puntajemax === "")){
		alert ("No pueden haber campos vacios.");
		e.preventDefault();
		return false;
	}
	else if (puntajemax < puntajemin){
		alert ("El puntaje maximo no debe ser menor al puntaje minimo.");
		e.preventDefault();
		return false;
	}
	else
		return true;
}

function validarCamposEliminar(e){
	if (!confirm ("¿Estas seguro que deseas eliminar esta reputacion?")){
		e.preventDefault();
	}
}
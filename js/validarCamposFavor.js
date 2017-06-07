/* Esta funcion verifica si los campos estan vacios.  || (document.getElementById("foto").value.length == 0) en la condicion del if para incluir la validacion de la foto. */

function validar (){
	"use strict";
	if ((document.getElementById("titulo").value.length === 0) || (document.getElementById("categoria").value.length === 0) || (document.getElementById("descripcion").value.length === 0) || (document.getElementById("fecha").value.length === 0) || (document.getElementById("ciudad").value.length === 0)){
		alert('No puede haber campos vacios.');
		return false;
	}
	else {
		var fec = document.getElementById("fecha").value;
		var fecha = fec.split("-");
		if (fecha.length !== 3){
			alert ('El formato de fecha no es valido. Formato: AAAA-MM-DD.');
			return false;
		}
		var dia = fecha[2];
		var mes = fecha[1];
		if (mes<=10){
			mes = mes - 1;
			mes = "0"+String(mes);
		}
		else{
			mes = mes-1;
			mes = String(mes);
		}
		var ano = fecha[0];
		var fa = new Date();
		if ((dia.length === 2) && (dia <= 31) && (dia > 0) && (mes <= 11) && (mes.length === 2) && (mes >= 0) && (ano.length === 4) && (ano > 0)){
			var f = new Date (ano,mes,dia);
			if (f < fa){
				alert ('La fecha debe ser mayor a la actual.');
				return false;
			}
		}
		else {
			alert ('El formato de fecha no es valido. Formato: AAAA-MM-DD.');
			return false;
		}
	}
}
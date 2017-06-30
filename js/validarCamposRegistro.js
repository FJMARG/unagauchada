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
	var fec = document.getElementById("fecha_nac").value;
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
	var aa = (new Date).getFullYear();
	aa = aa - 18;
	aa = String(aa);
	var ma = (new Date).getMonth();
	if (ma<10){
		ma = "0"+String(ma);
	}
	else{
		ma = String(ma);
	}
	var da = (new Date).getDate();
	if (da<10){
		da = "0"+String(da);
	}
	else{
		da = String(da);
	}
	var fa = new Date(aa,ma,da);
	if ((dia.length === 2) && (dia <= 31) && (dia > 0) && (mes <= 11) && (mes.length === 2) && (mes >= 0) && (ano.length === 4) && (ano > 0)){
		var f = new Date (ano,mes,dia);
		if (f > fa){
			alert ('Debes tener minimo 18 años para registrarte al sitio.');
			return false;
		}
	}
	else {
		alert ('El formato de fecha no es valido. Formato: AAAA-MM-DD.');
		return false;
	}
	var res=document.getElementById("rta").innerText;
	if (res === "E-mail no disponible o no permitido." || res.length === 0){
		alert ("E-mail no disponible o no permitido.");
		return false;
	}
}
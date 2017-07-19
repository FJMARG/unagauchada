function validarReporte(){
		if((document.getElementById("fechainicio").value.length == 0) || (document.getElementById("fechafinal").value.length == 0)){
			alert('No puede haber campos vacios.');
			return false;
		}
		else {
		var fec1 = document.getElementById("fechainicio").value;
		var fecha1 = fec1.split("-");
		if (fecha1.length !== 3){
			alert ('El formato la fecha inicio no es valido. Formato: AAAA-MM-DD.');
			return false;
		}
		var fec2 = document.getElementById("fechainicio").value;
		var fecha2 = fec2.split("-");
		if (fecha2.length !== 3){
			alert ('El formato la fecha final no es valido. Formato: AAAA-MM-DD.');
			return false;
		}
		var dia1 = fecha1[2];
		var mes1 = fecha1[1];
		if (mes1<=10){
			mes1 = mes1 - 1;
			mes1 = "0"+String(mes1);
		}
		else{
			mes1 = mes1-1;
			mes1 = String(mes1);
		}
		var dia2 = fecha2[2];
		var mes2 = fecha2[1];
		if (mes2<=10){
			mes2 = mes2 - 1;
			mes2 = "0"+String(mes2);
		}
		else{
			mes2 = mes2-1;
			mes2 = String(mes2);
		}
		var ano1 = fecha1[0];
		var ano2 = fecha2[0];
		var fa = new Date();
		if ((dia1.length === 2) && (dia1 <= 31) && (dia1 > 0) && (mes1 <= 11) && (mes1.length === 2) && (mes1 >= 0) && (ano1.length === 4) && (ano1 > 0) && (dia2.length === 2) && (dia2 <= 31) && (dia2 > 0) && (mes2 <= 11) && (mes2.length === 2) && (mes2 >= 0) && (ano2.length === 4) && (ano2 > 0)){
			var f1 = new Date (ano1,mes1,dia1);
			var f2 = new Date (ano2,mes2,dia2);
			if (f1 > f2){
				alert('La fecha de inicio debe ser mayor a la fecha final');
				return false;
			}
			if (f2 > fa){
				alert ('La fecha debe ser menor a la actual.');
				return false;
			}
		}
		else {
			alert ('El formato de fecha no es valido. Formato: AAAA-MM-DD.');
			return false;
		}
}
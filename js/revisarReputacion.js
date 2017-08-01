$(function(){
	$("#agregarReputacion").submit(function(event){
		var nombre = $("#nombrereputacion").val();
		var puntajemin = $("#puntajemin").val();
		var puntajemax = $("#puntajemax").val();
		$.ajax({
					data: {"nombre":nombre, "puntajemin":puntajemin, "puntajemax":puntajemax},
					url: './revisarreputaciones.php',
					type: 'post',
					async: false,
			}).done(function (respuesta){
				res = respuesta;
			});
			if (res === "1"){
				alert ("El nombre de la reputacion ya existe.");
				event.preventDefault();
			}
			if (res === "2"){
				alert ("El rango de puntajes superpone a otro o ya existe para otra reputacion.");
				event.preventDefault();
			}
	});
	$("#modificarReputacion").submit(function(event){
	var nombre = $("#nombrereputacion3").val();
	var puntajemin = $("#puntajemin2").val();
	var puntajemax = $("#puntajemax2").val();
	$.ajax({
				data: {"nombre":nombre, "puntajemin":puntajemin, "puntajemax":puntajemax},
				url: './revisarreputaciones.php',
				type: 'post',
				async: false,
		}).done(function (respuesta){
			res = respuesta;
		});
		if (res === "1"){
			alert ("El nombre de la reputacion ya existe.");
			event.preventDefault();
		}
		if (res === "2"){
			alert ("El rango de puntajes superpone a otro, o ya existe para otra reputacion.");
			event.preventDefault();
		}
	});
});
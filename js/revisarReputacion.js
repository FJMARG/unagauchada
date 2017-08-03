$(function(){
	$("#agregarReputacion").submit(function(event){
		if (validarCamposAgregar(event)){
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
			if (res === "3"){
				alert ("Imposible agregar. No pueden quedar espacios vacios en los rangos.");
				event.preventDefault();
			}
	}});
	$("#modificarReputacion").submit(function(event){
	if (validarCamposModificar(event)){
	var nombre = $("#nombrereputacion3").val();
	var puntajemin = $("#puntajemin2").val();
	var puntajemax = $("#puntajemax2").val();
	var id = $("#idreputacion").val();
	$.ajax({
				data: {"nombre":nombre, "puntajemin":puntajemin, "puntajemax":puntajemax, "id":id},
				url: './revisarreputaciones.php',
				type: 'post',
				async: false,
		}).done(function (respuesta){
			res = respuesta;
		});
		if (res === "1"){
			alert ("El rango de puntajes superpone a otro, o ya existe para otra reputacion.");
			event.preventDefault();
		}
		if (res === "2"){
			alert ("No pueden quedar espacios adelante y atras del rango.");
			event.preventDefault();
		}
		if (res === "3"){
			alert ("No puede quedar un espacio atras del rango.");
			event.preventDefault();
		}
		if (res === "4"){
			alert ("No puede quedar un espacio adelante del rango.");
			event.preventDefault();
		}
	}
	});
	$("#eliminarReputacion").submit(function(event){
		if (validarCamposEliminar(event)){
			var id = $("#idreputacion2").val();
			$.ajax({
				data: {"id":id},
				url: './revisarreputaciones.php',
				type: 'post',
				async: false,
			}).done(function (respuesta){
				res = respuesta;
			});
			if (res === "1"){
				alert ("Imposible eliminar reputacion. Eliminar esta reputacion producira un espacio vacio en los rangos.");
				event.preventDefault();
			}
		}
	});
});
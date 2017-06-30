/* 
Funcion que muestra si el E-mail esta disponible para registrarse.
Utiliza la libreria de jQuery.
Modifica el parrafo con id rta y obtiene el valor del input con id email. Al ingresar valores, llama a la funcion.
*/
$(function(){
	$("#email").on("input", function(){
		var correo=$(this).val();
		if (correo.indexOf('@') !== -1 && correo.indexOf ('.') !== -1){
			var cant;
			$.ajax({
					data: {"correo":correo},
					url: './emails.php',
					type: 'post',
					async: false,
			}).done(function (respuesta){
				cant = respuesta;
			});
			if (cant === "0"){
				$("#rta").html("<font color='green'>E-mail disponible.</font>");
			}
			else {
					$("#rta").html("<font color='red'>E-mail no disponible o no permitido.</font>");
			}
		}
		else {
			$("#rta").html("");
		}
	});
});
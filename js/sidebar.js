function w3_open(id) {
  $("#main").css("marginLeft","25%");
  $("#mySidebar").width("25%");
  updateCredits(id);
  $('#mySidebar').show();
  /*document.getElementById("main").style.marginLeft = "25%";
  document.getElementById("mySidebar").style.width = "25%";
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("openNav").style.display = 'none';*/
}
function w3_close() {
  $("#main").css("marginLeft", "0%");
  $('#mySidebar').hide();
  /*
  document.getElementById("main").style.marginLeft = "0%";
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("openNav").style.display = "inline-block";*/
}

function updateCredits(id) {
	var numero;
		$.ajax({
				data: {'id':id},
				url: './creditos.php',
				type: 'post',
				async: false,
		}).done(function (respuesta){
			numero = respuesta;
		});
		$("#cred").html("<center>Creditos: "+numero+"</center>");
}
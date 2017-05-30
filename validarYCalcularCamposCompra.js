/* Esta funcion verifica si los campos estan vacios. */

function validar (){
	if ((document.getElementById("pack").value.length == 0) || (document.getElementById("tarjeta").value.length == 0) || (document.getElementById("cantidad").value.length == 0) || (document.getElementById("total").value.length == 0)){
		alert('No puede haber campos vacios.');
		return false;
	}
}

/* Esta funcion calcula el precio de los creditos segun la cantidad que se lleve. */

function calcular(){
	var pack=document.getElementById("pack").value;
	var array=pack.split(",");
	var precio=array[1];
	var cantidad=document.getElementById("cantidad").value;
	document.getElementById("total").innerHTML="$"+precio*cantidad;
}
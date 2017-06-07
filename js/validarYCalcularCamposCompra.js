/* Esta funcion verifica si los campos estan vacios o tienen valores invalidos. */

function validar (){
	"use strict";
	var cantidad=document.getElementById("cantidad").value;
	var longcantidad=document.getElementById("cantidad").value.length;
	/* var pack=document.getElementById("pack").value; */
	var longpack=document.getElementById("pack").value.length;
	var tarjeta=document.getElementById("tarjeta").value;
	var longtarjeta=document.getElementById("tarjeta").value.length;
	/* var total=document.getElementById("total").value; */
	if ((longpack===0)||(longtarjeta===0)||(longcantidad===0)){
		alert('No puede haber campos vacios.');
		return false;
	}
	else if (cantidad>2147483647){
			alert('Se ha pasado del rango maximo permitido (2147483647).');
			document.getElementById("cantidad").value = 2147483647;
			calcular();
			return false;
		}
		else if (cantidad<=0){
				alert('No se pueden ingresar cero o cantidades negativas.');
				document.getElementById("cantidad").value = 1;
				calcular();
				return false;
			}
			else if (tarjeta<0){
					alert('No pueden existir numeros de tarjeta negativos.');
					return false;
				}
				else if (longtarjeta!==16){
						alert('El numero de tarjeta debe tener exactamente 16 digitos, sin ningun simbolo (por ejemplo, para numero de tarjeta "1111-1111-1111-1111" se debera ingresar "1111111111111111").');
						return false;
				}
}
			
/* Esta funcion calcula el precio de los creditos segun la cantidad que se lleve. */

function calcular(){
	"use strict";
	var pack=document.getElementById("pack").value;
	var array=pack.split(",");
	var precio=array[1];
	var cantidad=document.getElementById("cantidad").value;
	document.getElementById("total").innerHTML="$"+precio*cantidad;
}
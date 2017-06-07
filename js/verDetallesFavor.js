/* El codigo JavaScript para desplegar mas informacion de un favor. */

/*
En JavaScript, d.style.display sirve para acceder al valor de como se muestra el objeto, si se muestra el bloque, el valor es "block", si no se muestra el bloque, el valor es "none".
l.innerText sirve para acceder al texto del objeto.
document.getElementById(''); sirve para obtener el elemento haciendo referencia a su id.
onclick es un evento que ejecuta codigo al hacer clic.

e.preventDefault(); sirve para cancelar la acción predeterminada del enlace (para que no redireccione a "#", que llevaria al top de la pagina). Se le debe pasar el evento (event) como parametro, del objeto del cual se llama la funcion.
*/

function verDetalles(i,e) {
	var da = 'datos'+i;
	var li = 'link'+i;
    var d = document.getElementById(da);
	var l = document.getElementById(li);
    if (d.style.display === 'none') {
        d.style.display = 'block';
		l.innerText	= 'Mostrar menos.';
    } else {
        d.style.display = 'none';
		l.innerText = 'Mostrar m\u00e1s.'; // \u00e1s es el unicode de la letra "a" con tilde.
    }
	e.preventDefault();
}
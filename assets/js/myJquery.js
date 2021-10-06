$(window).ready(function(){
	var ubicacion = window.pageYOffset;
	var enlaces = document.getElementById('encabezado');
	window.onscroll = function(){
		var desplazamientoActual = window.pageYOffset;
		if (ubicacion >= desplazamientoActual) {
			enlaces.style.top='0';
		}
		else{
			enlaces.style.top='-60px';
		}
		ubicacion=desplazamientoActual;
	};
})
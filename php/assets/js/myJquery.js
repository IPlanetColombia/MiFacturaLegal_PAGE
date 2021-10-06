$(window).ready(function(){
	var ubicacion = window.pageYOffset;
	var enlaces = document.getElementById('encabezado');
	if(ubicacion >= '50'){
		$('#menu_first').addClass('text-white');
		$('.navbar-brand.menu_list').addClass('border_css');
	}else{
		$('#menu_first').removeClass('text-white');
		$('.navbar-brand.menu_list').removeClass('border_css');
	}
	window.onscroll = function(){
		var desplazamientoActual = window.pageYOffset;
		if (ubicacion >= desplazamientoActual) {
			enlaces.style.top='0';
		}
		else{
			enlaces.style.top='-85px';
		}
		if(ubicacion >= '50'){
			$('#menu_first').addClass('text-white');
			$('.navbar-brand.menu_list').addClass('border_css');
		}else{
			$('#menu_first').removeClass('text-white');
			$('.navbar-brand.menu_list').removeClass('border_css');
		}
		ubicacion=desplazamientoActual;
	};
})
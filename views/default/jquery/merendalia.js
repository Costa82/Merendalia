$(document).ready(function() {   
  		
	// popUps
    $(window).resize(function(){
    	var aviso = $('.aviso');
        aviso.css({ 
             'left': ($(window).width() / 2 - $(aviso).width() / 2) + 'px', 
             'top': ($(window).height() / 2 - $(aviso).height() / 2) + ($(window).scrollTop()) + 'px'
             });
    });
        
    $(window).resize();

    $('.aviso').click(function(e){
    	e.preventDefault();
        if ( $('.aviso').is(":visible") ) {
        	$('.aviso').fadeOut('slow');
        }else {
            $('.aviso').fadeIn('slow');
        }
    });
    
    // leer más
    $('.leerMas').on('click',function() {
		$(this).siblings( ".texto_leerMas" ).toggle("slow");
	    $(this).hide();
	    $(this).siblings('.leerMenos').show();
	});
	
	$('.leerMenos').on('click',function() {
		$(this).siblings( ".texto_leerMas" ).toggle("slow");
		$(this).siblings('.leerMas').show();
	    $(this).hide();
	});
	
	// Función que abre y cierra, al hacer click, lentamente el menú principal
	// de los dispositivos móviles.
	$('#menu_moviles').click(function(e) {
		e.stopPropagation();
		if ($("#lista_movil").is(":hidden")) {
			$("#lista_movil").slideDown("slow");
		} else {
			$("#lista_movil").slideUp("slow");
		}
	});

	$('html').click(function() {
		$("#lista_movil").slideUp("slow");
	});
	
	$('.rechazar').on('click',function() {
	    $('#overbox3').hide();
	});
	
	// menús infantiles
	$(window).resize(function(){
        var conocenos = $('.menu_infantil');
        conocenos.css({ 
             'left': ($(window).width() / 2 - $(conocenos).width() / 2) + 'px'
        });
	});

	// Función que muestra las listas al hacer click en el botonLista
	$('.mostrar_menus, .cerrar').click(function(e){
        $(window).resize();
          	e.preventDefault();
        if ( $('.menu_infantil').is(":visible") ) {
      	  $('.menu_infantil').fadeOut('slow');
        }else {
      	  $('.menu_infantil').fadeIn('slow');
        }
	});
	
	// ocultar productos
	$('#select').change(function() {
    	$('.bebidas')[ ($(this).val() == 'bebidas' || $(this).val() == 'refrescos' || $(this).val() == 'hielos' || $(this).val() == 'aguas' || 
    			$(this).val() == 'vinos' || $(this).val() == 'licores' || $(this).val() == 'cervezas' || $(this).val() == 'todo') ? 'show' : 'hide' ]()
        $('.refrescos')[ ($(this).val() == 'refrescos' || $(this).val() == 'todo' || $(this).val() == 'bebidas') ? 'show' : 'hide' ]()
        $('.cervezas')[ ($(this).val() == 'cervezas' || $(this).val() == 'todo' || $(this).val() == 'bebidas') ? 'show' : 'hide' ]()
        $('.vinos')[ ($(this).val() == 'vinos' || $(this).val() == 'todo' || $(this).val() == 'bebidas') ? 'show' : 'hide' ]()
		$('.hielos')[ ($(this).val() == 'hielos' || $(this).val() == 'todo' || $(this).val() == 'bebidas') ? 'show' : 'hide' ]()
		$('.aguas')[ ($(this).val() == 'aguas' || $(this).val() == 'todo' || $(this).val() == 'bebidas') ? 'show' : 'hide' ]()
		$('.licores')[ ($(this).val() == 'licores' || $(this).val() == 'todo' || $(this).val() == 'bebidas') ? 'show' : 'hide' ]()
        $('.entrantes')[ ($(this).val() == 'entrantes' || $(this).val() == 'canapes' || $(this).val() == 'raciones'|| $(this).val() == 'todo') ? 'show' : 'hide' ]()
		$('.canapes')[ ($(this).val() == 'canapes' || $(this).val() == 'entrantes' || $(this).val() == 'todo') ? 'show' : 'hide' ]()
		$('.raciones')[ ($(this).val() == 'raciones' || $(this).val() == 'entrantes' || $(this).val() == 'todo') ? 'show' : 'hide' ]()
		$('.ensaladas')[ ($(this).val() == 'ensaladas' || $(this).val() == 'todo') ? 'show' : 'hide' ]()
        $('.guisos')[ ($(this).val() == 'guisos' || $(this).val() == 'todo') ? 'show' : 'hide' ]()
        $('.merienda_infantil')[ ($(this).val() == 'merienda_infantil' || $(this).val() == 'todo') ? 'show' : 'hide' ]()
        $('.postres')[ ($(this).val() == 'postres' || $(this).val() == 'todo') ? 'show' : 'hide' ]()
    });
});

// mostrar listado
function showContent() {
	element = document.getElementById("listado");
	check = document.getElementById("check");
	if (check.checked) {
		element.style.display = 'block';
	} else {
		element.style.display = 'none';
	}
}

// cookies
function GetCookie(name) {
    var arg=name+"=";
    var alen=arg.length;
    var clen=document.cookie.length;
    var i=0;
 
    while (i<clen) {
        var j=i+alen;
 
        if (document.cookie.substring(i,j)==arg)
            return "1";
        i=document.cookie.indexOf(" ",i)+1;
        if (i==0)
            break;
    }
 
    return null;
}
 
function aceptar_cookies(){
    var expire=new Date();
    expire=new Date(expire.getTime()+7776000000);
    document.cookie="cookies_surestao=aceptada; expires="+expire;
 
    var visit=GetCookie("cookies_surestao");
 
    if (visit==1){
        popbox3();
    }
}
 
$(function() {
    var visit=GetCookie("cookies_surestao");
    if (visit==1){ popbox3(); }
});
 
function popbox3() {
    $('#overbox3').toggle();
}

// anclas
$(function() {
	$('a[href*="#"]:not([href="#"])').click(
	function() {
		if (location.pathname.replace(/^\//, '') == this.pathname
			.replace(/^\//, '')
			&& location.hostname == this.hostname) {
				var target = $(this.hash);
				target = target.length ? target : $('[name='
						+ this.hash.slice(1) + ']');
				if (target.length) {
					$('html, body').animate({
						scrollTop : target.offset().top
				}, 1000);
				return false;
			}
		}
	});
});
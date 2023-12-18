$(function(){
	var enlaces=$(".navfija li a");
	var navegacion=$(".navfija, .about, .encabezado");
	var paneles=document.querySelectorAll(".panel");
	var estados=[true, false, false, false, false];
	enlaces.click(function(){
		$(".activo").removeClass("activo");
		$(this).addClass("activo");
	})

	var cuerpo = document.querySelector('body');
	var overlay_transparente = document.querySelector('.overlay_transparente');
	cuerpo.style.overflow="hidden";
	setTimeout(()=>{
		cuerpo.style.overflow='auto';
		overlay_transparente.style.display = "none";
	},4500)


//PANELES-------------------------------------------------------------------------------------//

	window.addEventListener("scroll",function(){
		for(let i=0; i<paneles.length; i++){
			if(window.scrollY>=paneles[i].offsetTop-window.innerHeight-100&&window.scrollY<paneles[i].offsetTop+window.innerHeight){
				estados[i]?navegacion.addClass("negativo"):navegacion.removeClass("negativo");
				$(".activo").removeClass("activo");
				enlaces.eq(i-1).addClass("activo");
			}
		}
	})

//SLIDER--------------------------------------------------------------------------------------//

	$(".slider").slick({
		autoplay:true,
		arrows:true,
		slidesToShow:1,
		dots:false,
	})
	$(".slick-dots li button").html("");

//ENLACES-------------------------------------------------------------------------------------//

	$('a[href^="#"]').click(function() {
    var destino = $(this.hash);
    if (destino.length == 0) {
      destino = $('a[name="' + this.hash.substr(1) + '"]');
    }
    if (destino.length == 0) {
      destino = $('html');
    }
    $('html, body').animate({ scrollTop: destino.offset().top }, 300);
    return false;
  })

//DESPLEGABLE-----------------------------------------------------------------------------------//

	var toggle=document.querySelector(".toggle")
	var encabezado=document.querySelector(".encabezado")
	var abierto=false

	toggle.addEventListener("click",function(evento){
		evento.preventDefault()
		abierto?encabezado.classList.remove("desplegado"):encabezado.classList.add("desplegado")
		abierto=!abierto
		
	})

// WHEEL (https://stackoverflow.com/questions/8189840/get-mouse-wheel-events-in-jquery)---
	$(window).on('wheel', function(event){
	var encabezado=$(".encabezado");
	
	if(event.originalEvent.deltaY < 0){
		encabezado.addClass("visible")&&encabezado.removeClass("oculto");
	}
	else {
		encabezado.addClass("oculto")&&encabezado.removeClass("visible");
  	}
	});

})//DOCUMENT READY


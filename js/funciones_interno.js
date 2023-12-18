$(function(){

//SLIDER (PLUGIN)-----------------------------------------------------------------------------//

	$(".slider").slick({
		autoplay:true,
		arrows:true,
		slidesToShow:3,
		dots:false,
		fade:false,
	})
	$(".slick-dots li button").html("");



//DESPLEGABLE (CÓDIGO TRABAJADO EN CLASE)--------------------------------------------------//

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

//GALERIA PAGINAS INTERNAS (CÓDIGO TRABAJADO EN CLASE)

	var imagenGrande=$(".imagen_grande img");
	var miniaturas=$(".grid a");
	miniaturas.click(function(evento){
		evento.preventDefault();
		
	imagenGrande.attr("src",($(this).find("img").attr("src").split(".")[0])+"g.png")
	})

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
	
});

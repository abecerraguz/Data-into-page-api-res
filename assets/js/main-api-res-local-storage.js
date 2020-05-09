$(function () {

	var enlace = $('#pills-tab').find('li:first-child a').addClass('active');

	$('.verProducto').click(function(event){
		var ident            = parseInt($(this).attr('id'));
		var data = [ident];
		localStorage.setItem('datos', JSON.stringify(data));
	});

	var guardado = localStorage.getItem('datos');
	var datosParse = JSON.parse(guardado);

	$.get('http://localhost:8080/repuestos-express/wp-json/acf/v3/products-store', function(response) {

		var arr = Object.values(response);
		ident   = parseInt(datosParse[0]);


		arr.forEach((element, index) => {

			if( ident === element.id ){

				$(".marcaProducto").attr("value",element.acf.marca);
				$(".tituloProducto").attr("value",element.acf.titulo_repuesto);
				$(".detalleProducto").attr("value",element.acf.detalle_del_producto);
				$(".valorProducto").attr("value",element.acf.precio_del_producto);



		    $('.wpcf7-submit' ).click(function(event){
				event.preventDefault();

			    var form = $("#wpcf7-form");
			    var actionURL = form.attr("action");
			    console.log(element.acf.serial);
			    $.ajax({
			        url: actionURL,
			        data: form.serialize(),
			        cache: false,
			        success: function(result){
			            //window.location.href = 'https://webpay3g.transbank.cl/filtroUnificado/buttonService?buttonId='+element.acf.serial;
			            console.log(element.acf.serial);
			        }

			    });

			}); 

			}
	

		});

	});

});


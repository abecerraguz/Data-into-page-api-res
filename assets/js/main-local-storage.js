$(function () {

	var enlace = $('#pills-tab').find('li:first-child a').addClass('active');

	$('.verProducto').click(function(event){

		event.preventDefault();

		var dataMarca        = $('#marca-'+$(this).attr('id')).text();
		var dataTitulo       = $('#titulo-'+$(this).attr('id')).text();
		var dataDetalle      = $('#detalle-'+$(this).attr('id')).text();
		var dataDetalleDos   = $('#detalleDos-'+$(this).attr('id')).text();
		var dataPrecio       = $('#precio-'+$(this).attr('id')).text();

		//console.log(dataMarca+'<br>'+dataTitulo+'<br>'+dataDetalle+'<br>'+dataPrecio);
		var data = [dataMarca,dataTitulo,dataDetalle,dataPrecio,dataDetalleDos];
		localStorage.setItem('datos', JSON.stringify(data));

			const ident =parseInt($(this).attr('id'));

			$.get('http://localhost:8080/repuestos-express/wp-json/acf/v3/products-store', function(response) {

				var arr = Object.values(response);

				arr.forEach((element, index) => {

				//console.log(element.first_name,element.first_name,element.first_name,element.first_name);
				
				if( ident === element.id ){
						console.log('Entramos a'+element.acf.detalle_del_producto)

						$(".marcaProducto").attr("value",element.acf.marca);
						$(".tituloProducto").attr("value",datosParse[1]);
						$(".detalleProducto").attr("value",datosParse[2]);
						$(".valorProducto").attr("value",datosParse[3]);

				}


				});

			});

	});

	var guardado = localStorage.getItem('datos');
	var datosParse = JSON.parse(guardado);
	$(".marcaProducto").attr("value",datosParse[0]);
	$(".tituloProducto").attr("value",datosParse[1]);
	$(".detalleProducto").attr("value",datosParse[2]);
	$(".valorProducto").attr("value",datosParse[3]);


	$('.wpcf7-submit' ).click(function(event) {
		event.preventDefault();
		console.log('Formualrio');
	    var form = $("#wpcf7-form");
	    var actionURL = form.attr("action");

	    $.ajax({
	        url: actionURL,
	        data: form.serialize(),
	        cache: false,
	        success: function(result){
	            window.location.href = 'https://webpay3g.transbank.cl/filtroUnificado/buttonService?buttonId='+datosParse[4];
	        }
	    });

	}); 


});


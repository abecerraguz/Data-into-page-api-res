$(function () {

    var enlace = $('#pills-tab').find('li:first-child a').addClass('active');

    $('.verProducto').click(function(event){
 
        var ident            = parseInt($(this).attr('id'));
        var data = [ident];
        localStorage.setItem('datos', JSON.stringify(data));
        console.log(ident);
    });

    var guardado = localStorage.getItem('datos');
    var datosParse = JSON.parse(guardado);

    $.get('http://repuestosexpress.cl/wp-json/acf/v3/products-store', function(response) {

        var arr = Object.values(response);
        ident   = parseInt(datosParse[0]);


        arr.forEach((element, index) => {

            if( ident === element.id ){

                $(".marcaProducto").attr("value",element.acf.marca);
                $(".tituloProducto").attr("value",element.acf.titulo_repuesto);
                $(".detalleProducto").attr("value",element.acf.detalle_del_producto);
                $(".valorProducto").attr("value",element.acf.precio_del_producto);
                
                document.addEventListener( 'wpcf7mailsent', function( event ) {   

                    var time = 2
                    setInterval( function() {
                        time--;
                        if (time === 0) {

                        location = 'https://webpay3g.transbank.cl/filtroUnificado/buttonService?buttonId='+element.acf.serial;

                        }    
                    }, 1000 );


                }, false );
  
            }
        });

    });

});
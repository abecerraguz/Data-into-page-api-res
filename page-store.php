<?php 

/*
  Template Name: Products Store
  Template Post Type: post, page, products-store
*/


get_header(); ?>
<?php include(TEMPLATEPATH.'/includes/banner-central-store.php');?>
<?php include(TEMPLATEPATH.'/includes/banner-central-store-mobile.php');?>


<section class="container-fluid">
    <div class="col-md-12 text-center top-30 bottom-30">
        <h1>ENCUENTRA EL REPUESTO Y ACCESORIO QUE BUSCAS</h1>
        <h3 class="gris-claro">SOMOS REPRESENTANTES OFICIALES DE LAS MARCAS</h3>
    </div>
</section>

<!-- Inicio del row -->
          <?php 

              echo '<div class="container">';
   
              echo '<ul class="nav nav-pills mb-4 mt-4 text-center text-uppercase" id="pills-tab" role="tablist">';
              if(have_posts()){
                $categories = get_categories( array(
                    'orderby' => 'name',
                    'order'   => 'ASC',
                    'exclude' => '1,9',
                ));
                $valor = 0;
                foreach( $categories as $category ){
                if ( ! empty( $categories ) ) {
                        echo ' <li class="nav-item">';
                        echo '<a class="nav-item nav-link" id="nav-'.esc_html( $categories[$valor]->slug ).'-tab" data-toggle="tab" href="#nav-'.esc_html( $categories[$valor]->slug ).'" role="tab" aria-controls="nav-'.esc_html( $categories[$valor]->slug).'" aria-selected="true">'.$category->name. '</a>';
                        echo '</li>';
                  }
                  $valor++; 
                } 

                }else{
                  echo '<h3>Lo sentimos no existe publicación</h3>';
                }

              
              echo '</ul>';


              echo '<div class="tab-content my-4" id="nav-tabContent">';

                 

                        if(have_posts()){
                            $arg= array(
                              'post_type'      => 'products-store',
                              'posts_per_page' =>  -1,
                              'orderby'        => 'title',
                              'order'          => 'ASC',
                              'category_name'  => 'repuestos-chery'
                            );
                      
                            $the_query = new WP_Query($arg);
                            $cat = get_term_by('slug','repuestos-chery','category');
                            echo '<div class="tab-pane fade show active" id="nav-'.$cat->slug.'" role="tabpanel" aria-labelledby="'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            $numero = 0;
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca        = get_field('marca');
                            $detalle      = get_field('detalle_del_producto');
                            $detalleDos   = get_field('serial');
                            $precio       = get_field('precio_del_producto');
                            $id           = get_the_ID();

                            echo '<div class="col-md-3">';
                            echo '<article class="contenCard">';
                            echo '<div class="headerCard">';
                            echo the_post_thumbnail('squere', array('class' => 'img-fluid object-fit'));
                            echo '</div>';
                            echo '<div class="headerBody">';
                            echo '<ul class="list-group list-group-flush text-primary datos">';
                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
                            echo '<li class="list-group-item titulo font-weight-bold" id="'.'titulo-'.$id.'">'.get_the_title().'</li>';
                            echo '<li class="list-group-item detalle" id="'.'detalle-'.$id.'">'.$detalle.'</li>';
                            echo '</ul>';
                            echo '<span class="precio" id="'.'precio-'.$id.'">$ '.$precio.'</span>';
                            echo '</div>';
                            echo '<div class="headerFooter">';
                            echo ' <a class="btn btn-primary bloque verProducto" href="'.get_the_permalink().'" id="'.$id.'">VER PRODUCTO</a>';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>'; 
                            $numero++;
                            endwhile;
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos Chery</h3>';
                          }
                          wp_reset_postdata();

                          if(have_posts()){
                            $arg= array(
                              'post_type'      => 'products-store',
                              'posts_per_page' =>  -1,
                              'orderby'        => 'title',
                              'order'          => 'DEC',
                              'category_name'  => 'repuestos-fiat'
                            );
                      
                            $the_query = new WP_Query($arg);
                            $cat = get_term_by('slug','repuestos-fiat','category');
                            echo '<div class="tab-pane fade show" id="nav-'.$cat->slug.'" role="tabpanel" aria-labelledby="'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            $numero = 0;
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca     = get_field('marca');
                            $detalle   = get_field('detalle_del_producto');
                            $detalleDos   = get_field('serial');
                            $precio    = get_field('precio_del_producto');
                            $id        = get_the_ID();

                            echo '<div class="col-md-3">';
                            echo '<article class="contenCard">';
                            echo '<div class="headerCard">';
                            echo the_post_thumbnail('squere', array('class' => 'img-fluid object-fit'));
                            echo '</div>';
                            echo '<div class="headerBody">';
                            echo '<ul class="list-group list-group-flush text-primary datos">';
                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
                            echo '<li class="list-group-item titulo font-weight-bold" id="'.'titulo-'.$id.'">'.get_the_title().'</li>';
                            echo '<li class="list-group-item detalle" id="'.'detalle-'.$id.'">'.$detalle.'</li>';
                            echo '</ul>';
                            echo '<span class="precio" id="'.'precio-'.$id.'">$ '.$precio.'</span>';
                            echo '</div>';
                            echo '<div class="headerFooter">';
                            echo ' <a class="btn btn-primary bloque verProducto" href="'.get_the_permalink().'" id="'.$id.'">VER PRODUCTO</a>';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>'; 
                            $numero++;
                            endwhile;
                            wp_reset_postdata();
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos Fiat</h3>';
                          }

                          if(have_posts()){
                            $arg= array(
                              'post_type'      => 'products-store',
                              'posts_per_page' =>  -1,
                              'orderby'        => 'title',
                              'order'          => 'DEC',
                              'category_name'  => 'repuestos-hyundai'
                            );
                      
                            $the_query = new WP_Query($arg);
                            $cat = get_term_by('slug','repuestos-hyundai','category');
                            echo '<div class="tab-pane fade show" id="nav-'.$cat->slug.'" role="tabpanel" aria-labelledby="'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            $numero = 0;
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca     = get_field('marca');
                            $detalle   = get_field('detalle_del_producto');
                            $detalleDos   = get_field('serial');
                            $precio    = get_field('precio_del_producto');
                            $id        = get_the_ID();

                            echo '<div class="col-md-3">';
                            echo '<article class="contenCard">';
                            echo '<div class="headerCard">';
                            echo the_post_thumbnail('squere', array('class' => 'img-fluid object-fit'));
                            echo '</div>';
                            echo '<div class="headerBody">';
                            echo '<ul class="list-group list-group-flush text-primary datos">';
                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
                            echo '<li class="list-group-item titulo font-weight-bold" id="'.'titulo-'.$id.'">'.get_the_title().'</li>';
                            echo '<li class="list-group-item detalle" id="'.'detalle-'.$id.'">'.$detalle.'</li>';
                            echo '</ul>';
                            echo '<span class="precio" id="'.'precio-'.$id.'">$ '.$precio.'</span>';
                            echo '</div>';
                            echo '<div class="headerFooter">';
                            echo ' <a class="btn btn-primary bloque verProducto" href="'.get_the_permalink().'" id="'.$id.'">VER PRODUCTO</a>';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>'; 
                            $numero++;
                            endwhile;
                            wp_reset_postdata();
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos Fiat</h3>';
                          }

                          if(have_posts()){
                            $arg= array(
                              'post_type'      => 'products-store',
                              'posts_per_page' =>  -1,
                              'orderby'        => 'title',
                              'order'          => 'DEC',
                              'category_name'  => 'repuestos-mg'
                            );
                      
                            $the_query = new WP_Query($arg);
                            $cat = get_term_by('slug','repuestos-mg','category');
                            echo '<div class="tab-pane fade show" id="nav-'.$cat->slug.'" role="tabpanel" aria-labelledby="'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            $numero = 0;
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca     = get_field('marca');
                            $detalle   = get_field('detalle_del_producto');
                            $detalleDos   = get_field('serial');
                            $precio    = get_field('precio_del_producto');
                            $id        = get_the_ID();

                            echo '<div class="col-md-3">';
                            echo '<article class="contenCard">';
                            echo '<div class="headerCard">';
                            echo the_post_thumbnail('squere', array('class' => 'img-fluid object-fit'));
                            echo '</div>';
                            echo '<div class="headerBody">';
                            echo '<ul class="list-group list-group-flush text-primary datos">';
                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
                            echo '<li class="list-group-item titulo font-weight-bold" id="'.'titulo-'.$id.'">'.get_the_title().'</li>';
                            echo '<li class="list-group-item detalle" id="'.'detalle-'.$id.'">'.$detalle.'</li>';
                            echo '</ul>';
                            echo '<span class="precio" id="'.'precio-'.$id.'">$ '.$precio.'</span>';
                            echo '</div>';
                            echo '<div class="headerFooter">';
                            echo ' <a class="btn btn-primary bloque verProducto" href="'.get_the_permalink().'" id="'.$id.'">VER PRODUCTO</a>';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>'; 
                            $numero++;
                            endwhile;
                            wp_reset_postdata();
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos Fiat</h3>';
                          }

                          if(have_posts()){
                            $arg= array(
                              'post_type'      => 'products-store',
                              'posts_per_page' =>  -1,
                              'orderby'        => 'title',
                              'order'          => 'DEC',
                              'category_name'  => 'repuestos-hyundai'
                            );
                      
                            $the_query = new WP_Query($arg);
                            $cat = get_term_by('slug','repuestos-hyundai','category');
                            echo '<div class="tab-pane fade show" id="nav-'.$cat->slug.'" role="tabpanel" aria-labelledby="'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            $numero = 0;
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca     = get_field('marca');
                            $detalle   = get_field('detalle_del_producto');
                            $detalleDos   = get_field('serial');
                            $precio    = get_field('precio_del_producto');
                            $id        = get_the_ID();

                            echo '<div class="col-md-3">';
                            echo '<article class="contenCard">';
                            echo '<div class="headerCard">';
                            echo the_post_thumbnail('squere', array('class' => 'img-fluid object-fit'));
                            echo '</div>';
                            echo '<div class="headerBody">';
                            echo '<ul class="list-group list-group-flush text-primary datos">';
                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
                            echo '<li class="list-group-item titulo font-weight-bold" id="'.'titulo-'.$id.'">'.get_the_title().'</li>';
                            echo '<li class="list-group-item detalle" id="'.'detalle-'.$id.'">'.$detalle.'</li>';
                            echo '</ul>';
                            echo '<span class="precio" id="'.'precio-'.$id.'">$ '.$precio.'</span>';
                            echo '</div>';
                            echo '<div class="headerFooter">';
                            echo ' <a class="btn btn-primary bloque verProducto" href="'.get_the_permalink().'" id="'.$id.'">VER PRODUCTO</a>';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>'; 
                            $numero++;
                            endwhile;
                            wp_reset_postdata();
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos Fiat</h3>';
                          }

                          if(have_posts()){
                            $arg= array(
                              'post_type'      => 'products-store',
                              'posts_per_page' =>  -1,
                              'orderby'        => 'title',
                              'order'          => 'DEC',
                              'category_name'  => 'repuestos-mitsubishi'
                            );
                      
                            $the_query = new WP_Query($arg);
                            $cat = get_term_by('slug','repuestos-mitsubishi','category');
                            echo '<div class="tab-pane fade show" id="nav-'.$cat->slug.'" role="tabpanel" aria-labelledby="'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            $numero = 0;
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca     = get_field('marca');
                            $detalle   = get_field('detalle_del_producto');
                            $detalleDos   = get_field('serial');
                            $precio    = get_field('precio_del_producto');
                            $id        = get_the_ID();

                            echo '<div class="col-md-3">';
                            echo '<article class="contenCard">';
                            echo '<div class="headerCard">';
                            echo the_post_thumbnail('squere', array('class' => 'img-fluid object-fit'));
                            echo '</div>';
                            echo '<div class="headerBody">';
                            echo '<ul class="list-group list-group-flush text-primary datos">';
                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
                            echo '<li class="list-group-item titulo font-weight-bold" id="'.'titulo-'.$id.'">'.get_the_title().'</li>';
                            echo '<li class="list-group-item detalle" id="'.'detalle-'.$id.'">'.$detalle.'</li>';
                            echo '</ul>';
                            echo '<span class="precio" id="'.'precio-'.$id.'">$ '.$precio.'</span>';
                            echo '</div>';
                            echo '<div class="headerFooter">';
                            echo ' <a class="btn btn-primary bloque verProducto" href="'.get_the_permalink().'" id="'.$id.'">VER PRODUCTO</a>';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>'; 
                            $numero++;
                            endwhile;
                            wp_reset_postdata();
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos Fiat</h3>';
                          }


                          if(have_posts()){
                            $arg= array(
                              'post_type'      => 'products-store',
                              'posts_per_page' =>  -1,
                              'orderby'        => 'title',
                              'order'          => 'DEC',
                              'category_name'  => 'repuestos-ssangyong'
                            );
                      
                            $the_query = new WP_Query($arg);
                            $cat = get_term_by('slug','repuestos-ssangyong','category');
                            echo '<div class="tab-pane fade show" id="nav-'.$cat->slug.'" role="tabpanel" aria-labelledby="'.$cat->slug.'-tab">';
                            echo '<div class="row text-left">';
                            $numero = 0;
                            while($the_query->have_posts()) : $the_query->the_post();
                            $marca     = get_field('marca');
                            $detalle   = get_field('detalle_del_producto');
                            $detalleDos   = get_field('serial');
                            $precio    = get_field('precio_del_producto');
                            $id        = get_the_ID();

                            echo '<div class="col-md-3">';
                            echo '<article class="contenCard">';
                            echo '<div class="headerCard">';
                            echo the_post_thumbnail('squere', array('class' => 'img-fluid object-fit'));
                            echo '</div>';
                            echo '<div class="headerBody">';
                            echo '<ul class="list-group list-group-flush text-primary datos">';
                            echo '<li class="list-group-item marca text-uppercase" id="'.'marca-'.$id.'">'.$marca.'</li>';
                            echo '<li class="list-group-item titulo font-weight-bold" id="'.'titulo-'.$id.'">'.get_the_title().'</li>';
                            echo '<li class="list-group-item detalle" id="'.'detalle-'.$id.'">'.$detalle.'</li>';
                            echo '</ul>';
                            echo '<span class="precio" id="'.'precio-'.$id.'">$ '.$precio.'</span>';
                            echo '</div>';
                            echo '<div class="headerFooter">';
                            echo ' <a class="btn btn-primary bloque verProducto" href="'.get_the_permalink().'" id="'.$id.'">VER PRODUCTO</a>';
                            echo '</div>';
                            echo '</article>';
                            echo '</div>'; 
                            $numero++;
                            endwhile;
                            wp_reset_postdata();
                            echo '</div>';
                            echo '</div>';
                          }else{
                            echo '<h3>Lo sentimos no existen Repuestos Fiat</h3>';
                          }
                         

              echo '</div>';
              echo '</div>';

        ?>

  <!-- Cierre del row -->




<section class="total text-center degradado-peugeot">
    <section class="container top-40 bottom-50">
	    <div class="row">
		    <div class="col-md-12">
		        <h2 class="blanco">DESPACHAMOS A TODO CHILE</h2>
		        <hr class="blanco">
		        <h3 class="blanco fw300">No importa donde te encuentres, envíamos tus repuestos a lo largo del país.</h3>
		    </div>
	    </div>
    </section>
</section>

<section class="container-fluid">
	<div class="row">
	    <div class="col-md-6 text-center top-30 bottom-30">
			<h3>ELIGE REPUESTOS ORIGINALES</h3>
	        <hr class="colored">
	        
	        <ul class="bullet fw500 text-center">
				<li>Mantén la performance de tu <strong>vehículo</strong> como cuando era nuevo.</li>
				<li>Seguridad y calidad que <strong>las marcas</strong> recomiendan para tu auto .</li>
				<li>Mejor precio de reventa cuando <strong>desees venderlo</strong> o cambiarlo .</li>
			</ul>
	    </div>
	
	    <div class="col-md-6 text-center top-30 bottom-30">
	        <h3>FORMAS DE PAGO</h3>
	        <hr class="colored">
	        <p>Elige el método de pago que más te acomode.</p>
	        <img src="<?php echo THEME_DIR; ?>/img/tarjetas-cotizar.png" class="img-fluid top-10 bottom-10">
	    </div>
    
	</div>
</section>

<?php include(TEMPLATEPATH.'/includes/distribuidores-marcas-bn.php');?>
<?php get_footer(); ?>
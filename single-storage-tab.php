<?php get_header();?>
<!-- Cierre del header.php -->

<!-- Inicio del main etiqueta HTML5 -->
<main>
  <!-- Inicio de la section etiqueta de HTML5 -->
  <section class="single">
    <div class="container">

      <!-- Inicio del row -->
              <?php 
                  echo '<div class="col-md-12">';
       
                  echo '<ul class="nav nav-pills mb-4 mt-4 text-center text-uppercase" id="pills-tab" role="tablist">';
                  if(have_posts()){
                    $categories = get_categories( array(
                        'orderby' => 'name',
                        'order'   => 'ASC',
                        'exclude' => '1,2',
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
                                  'order'          => 'DEC',
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
                                // echo '<li class="list-group-item detalleDos d-none" id="'.'detalleDos-'.$id.'">'.$detalleDos.'</li>';
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
                                // echo '<li class="list-group-item detalleDos d-none" id="'.'detalleDos-'.$id.'">'.$detalleDos.'</li>';
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

            ?>

     
      <!-- Cierre del row -->


 

          

    </div>
  </section>
  <!-- Cierre de la section etiqueta de HTML5 -->
</main>
<!-- Cierre del main etiqueta HTML5 -->

<!-- Inicio del footer.php -->
<?php get_footer();?>
<!-- Cierre del footer.php -->



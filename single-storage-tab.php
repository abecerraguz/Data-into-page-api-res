<?php

/*
Template Name: Products Store Single
Template Post Type: post, products-store

*/

 get_header(); ?>

<section class="container top-100">
    <div class="col-md-12 text-center top-30 bottom-30">
        <h1><?php the_title(); ?></h1>
    </div>
</section>


<section class="total">
  <section class="container">
    
    <div class="row">
      <div class="col-md-4">
        <?php 
            echo '<div class="headerCard-single">';
                      echo the_post_thumbnail('squere-single-tab', array('class' => 'img-fluid object-fit-single'));
                      echo '</div>';
         ?>
      </div>
      
      <div class="col-md-4">
        <p class="destacado no-space"><?php the_field('marca'); ?></p>
        <h4 class="no-space"><strong> <?php the_title(); ?>. </strong>  </h4>         
        <h2>$ <?php the_field('precio_del_producto'); ?></h2>               
      </div>  
      
      <div class="col-md-4">

        <?php echo do_shortcode('[contact-form-7 id="1128" title="SINGLE-PRODUCTOS-STORE"]');?>

      </div>
    
    </div><!-- ROW -->
    
  </section>
</section>


<div class="container top-50 bottom-40">
  <div class="row text-center">
    <div class="col-md-12">
      <h3> También te pueden interesar estos productos</h3>
    </div>
    
  


    <?php 




        if(have_posts()){
            if (in_category('repuestos-fiat')) {
                $argChery= array(
                  'post_type'    => 'products-store',
                  'posts_per_page' =>  4,
                  'orderby'        => 'title',
                  'order'          => 'DEC',
                  'category_name' => 'repuestos-fiat'
                );
          
                $queryChery = new WP_Query($argChery);
              $numero = 0;
                while($queryChery->have_posts()) : $queryChery->the_post();

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
          }
        }else{
            echo '<h3>Lo sentimos no existe publicación</h3>';
          }
          wp_reset_postdata();



        if(have_posts()){
            if (in_category('repuestos-chery')) {
                $argChery= array(
                  'post_type'    => 'products-store',
                  'posts_per_page' =>  4,
                  'orderby'        => 'title',
                  'order'          => 'DEC',
                  'category_name' => 'repuestos-chery'
                );
          
                $queryChery = new WP_Query($argChery);
              $numero = 0;
                while($queryChery->have_posts()) : $queryChery->the_post();

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
          }
        }else{
            echo '<h3>Lo sentimos no existe publicación</h3>';
          }
          wp_reset_postdata();

          if(have_posts()){
          if (in_category('repuestos-hyundai')) {
              $argChery= array(
                'post_type'    => 'products-store',
                'posts_per_page' =>  4,
                'orderby'        => 'title',
                'order'          => 'DEC',
                'category_name' => 'repuestos-hyundai'
              );
        
              $queryChery = new WP_Query($argChery);
            $numero = 0;
              while($queryChery->have_posts()) : $queryChery->the_post();

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
        }
      }else{
          echo '<h3>Lo sentimos no existe publicación</h3>';
        }
        wp_reset_postdata();

        if(have_posts()){
        if (in_category('repuestos-mg')) {
            $argChery= array(
              'post_type'    => 'products-store',
              'posts_per_page' =>  4,
              'orderby'        => 'title',
              'order'          => 'DEC',
              'category_name' => 'repuestos-mg'
            );
      
            $queryChery = new WP_Query($argChery);
          $numero = 0;
            while($queryChery->have_posts()) : $queryChery->the_post();

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
      }
    }else{
        echo '<h3>Lo sentimos no existe publicación</h3>';
      }
      wp_reset_postdata();

        if(have_posts()){
        if (in_category('repuestos-mitsubishi')) {
            $argChery= array(
              'post_type'    => 'products-store',
              'posts_per_page' =>  4,
              'orderby'        => 'title',
              'order'          => 'DEC',
              'category_name' => 'repuestos-mitsubishi'
            );
      
            $queryChery = new WP_Query($argChery);
          $numero = 0;
            while($queryChery->have_posts()) : $queryChery->the_post();

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
      }
    }else{
        echo '<h3>Lo sentimos no existe publicación</h3>';
      }
      wp_reset_postdata();

      if(have_posts()){
      if (in_category('repuestos-ssangyong')) {
          $argChery= array(
            'post_type'    => 'products-store',
            'posts_per_page' =>  4,
            'orderby'        => 'title',
            'order'          => 'DEC',
            'category_name' => 'repuestos-ssangyong'
          );
    
          $queryChery = new WP_Query($argChery);
        $numero = 0;
          while($queryChery->have_posts()) : $queryChery->the_post();

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
    }
  }else{
      echo '<h3>Lo sentimos no existe publicación</h3>';
    }
    wp_reset_postdata();







     ?>
    <!-- INICIO DEL LOOP DEL PRODUCTO -->


      
  </div>  <!-- ROW -->
</div>          


<?php include(TEMPLATEPATH.'/includes/distribuidores-marcas-bn.php');?>
<?php get_footer(); ?>
<?php get_header(); ?>

<div class="row">

  <!--ENTRADAS-->
  <div class="col-lg-9">

  <h3 class="bg-primary text-white py3 mb-5 text-center">Resultado de búsqueda:</h3>

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!--ENTRADA-->
        <div class="card-body">

          <a href="<?php the_permalink();?>" >
            <h2><?php the_title();?></h2>
          </a>
        
        </div>

    <?php endwhile;?>

    <?php else: ?>

        <h5>No se encontró el término:</h5>
        <?php printf(esc_html( '%s' ),get_search_query( )); ?>
    
    
   <?php endif; ?>

    <!--PAGINACIÓN-->
    <div class="card-body">

      <?php get_template_part( '/template-parts/content', 'paginacion' )?>

    </div>


  </div>

      <!--ASIDE-->

      <?php get_sidebar();?>

</div>
</div>

<?php get_footer(); ?>
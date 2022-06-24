<?php get_header(); ?>

<div class="row">

  <!--ENTRADAS-->
  <div class="col-lg-9">

    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        <!--ENTRADA-->
        <div class="card-body">
            <h2><?php the_title();?></h2>
          </a>
          <p class="small mb-0">Fecha: <?php the_time('F j, Y');?></p>
          <p class="small mb-0">Autor: <?php the_author();?></p>
          <p class="small">Categoria:<?php the_category( '/' );?></p>
               
          <?php 
          
          // check if the post or page has a Featured Image assigned to it.
          if ( has_post_thumbnail() ) {
               the_post_thumbnail('post-thumbnails',array(
                'class' => 'img-fluid mb-3'
               ));
            }
        
        ?>


            <?php the_content();?>
            <?php 
                            
                // If comments are open or we have at least one comment, load up the comment template.
                if ( comments_open() || get_comments_number() ) :
                    comments_template();
                endif;
            
            ?>
        </div>

    <?php endwhile;
    endif; ?>
  </div>

  <!--ASIDE-->
      <!--ASIDE-->

      <?php get_sidebar();?>

</div>
</div>

<?php get_footer(); ?>
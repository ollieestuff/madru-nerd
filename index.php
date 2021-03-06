<?php get_header(); ?>

<!--<div class="featured-post">
   <a href="#" class="post-content">
      <span class="category">Cinema</span>
      <h2 class="title">Estréia Star Wars os ùltimos Jedi</h2>
   </a>
</div>-->




<div class="featured-posts-container">

   <?php
      //
      //    POSTS EM DESTAQUE
      //

      //Arg para posts com valor madru_featured = primary
      $argsPrimary = array(
         'posts_per_page' => -1,
         'meta_query' => array(
            array(
               'key' => 'madru_featured',
               'value' => 'primary'
            ),
         ),
      );

      $queryPrimary = new WP_Query($argsPrimary);

      if ( $queryPrimary->have_posts() ) :
            while ( $queryPrimary->have_posts() ) :
                  $queryPrimary->the_post();
   ?>

                     <article class="post featured-post featured-primary">
                        <div class="post-content">
                           <a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                              <?php the_post_thumbnail( 'post-thumbnail', madru_data_focus(get_the_id()) ) ?>
                           </a>
                           <footer class="post-footer">
                              <h3 class="category"><?php the_category(' | '); ?></h3>
                              <a href="<?php the_permalink(); ?>" title="Link para: <?php the_title_attribute(); ?>">
                              <h2 class="title"><?php the_title(); ?></h2>
                           </footer>
                        </div>
                     </article>

      <?php endwhile; endif; ?>


   <div class="featured-secondary-posts-container">

      <?php
         //
         // madru_featured = SECONDARY
         //

         //Arg para posts com valor madru_featured = secondary
         $argsSecondary = array(
            'posts_per_page' => -1,
            'meta_query' => array(
               array(
                  'key' => 'madru_featured',
                  'value' => 'secondary'
               ),
            ),
         );

         $querySecondary = new WP_Query($argsSecondary);

         if ( $querySecondary->have_posts() ) :
               while ( $querySecondary->have_posts() ) :
                     $querySecondary->the_post();
      ?>

                     <article class="post featured-post featured-secondary">
                        <div class="post-content">
                           <a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                              <?php the_post_thumbnail( 'post-thumbnail', madru_data_focus(get_the_id()) ) ?>
                           </a>
                           <footer class="post-footer">
                              <h3 class="category"><?php the_category(' | '); ?></h3>
                              <a href="<?php the_permalink(); ?>" title="Link para: <?php the_title_attribute(); ?>">
                              <h2 class="title"><?php the_title(); ?></h2>
                           </footer>
                        </div>
                     </article>

         <?php endwhile; endif; ?>

   </div> <!-- .featured-secondary-posts-container -->

</div> <!-- .featured-posts-container -->


<?php

   //
   //    POSTS NORMAIS (DEFAULT)
   //

   //Arg para todos os posts que não possuem valor madru_featured
   $argsDefault = array(
      'posts_per_page' => -1,
      'meta_query' => array(
         'relation' => 'OR',
         array(
            'key' => 'madru_featured',
            'compare' => 'NOT EXISTS',
            'value' => ''
         ),
         array(
            'key' => 'madru_featured',
            'value' => 'none'
         ),
      ),
   );

   //Query custom
   $queryDefault = new WP_Query($argsDefault);

   if ( $queryDefault->have_posts() ) :
         while ( $queryDefault->have_posts() ) :
               $queryDefault->the_post();
?>

               <article class="post default-post">
                  <a class="featured-image" href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                     <?php the_post_thumbnail( 'post-thumbnail', madru_data_focus(get_the_id()) ) ?>
                  </a>
                  <div class="post-content">
                     <h3 class="category"><?php the_category(' | '); ?></h3>
                     <a href="<?php the_permalink(); ?>" title="Link para: <?php the_title_attribute(); ?>">
                     <h2 class="title"><?php the_title(); ?></h2>
                  </div>
               </article>

   <?php endwhile; endif; ?>







<?php get_footer(); ?>

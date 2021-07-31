<?php global $redux ?>

<section id="archive" class="std side py-5">
   
   <?php $query = new WP_Query( array( 'posts_per_page' => $redux['arn'], 
   'cat' => $wp_query->get_queried_object_id() ) ); ?>
   
   <script>
      var catid = "<?php echo $wp_query->get_queried_object_id() ?>";
      var templateURL = "<?php echo get_template_directory_uri(); ?>";
      var armaxPages = "<?php echo intval( $query->max_num_pages ); ?>";
   </script>
   <script src="<?php echo get_template_directory_uri(); ?>/js/archive.js"></script>

   <div class="container p-4 p-md-5 text-center">

      <h2 class="my-3"><?php single_cat_title(); ?></h2>
      <?php echo category_description(); ?>

      <?php if ( have_posts() ) : ?>

      <div class="row no-gutters text-center post py-3">

         <?php while ( $query->have_posts() ) : $query->the_post(); ?>

         <?php if( $query->current_post != 0 ) : ?>
         <div class="col-md-12 mx-auto px-3 px-md-4">
            <hr class="m-0 p-0">
         </div>
         <?php endif; ?>
         <div class="col-md-12 mx-auto p-3 p-md-4">
            <?php if( has_post_thumbnail() ) : ?>
            <div class="row">
               <?php if( $query->current_post % 2 == 0 ) : ?>
               <div class="col-md-7 p-md-3">
                  <h2 class="my-3"><a class="text-reset text-decoration-none" 
                  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p><?php if ( $redux['wp1v2'] == 1 ) { echo get_the_author(); } ?>
                  <?php if ( $redux['wp1v2'] == 1 && $redux['wp1v3'] == 1 ) { echo ' | '; } ?>
                  <?php if ( $redux['wp1v3'] == 1 ) { echo get_the_date(); } ?></p>
               </div>
               <div class="col-md-5">
                  <div class="image"><a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <?php else : ?>
               <div class="col-md-5">
                  <div class="image"><a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <div class="col-md-7 p-md-3">
                  <h2 class="my-3"><a class="text-reset text-decoration-none" 
                  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p><?php if ( $redux['wp1v2'] == 1 ) { echo get_the_author(); } ?>
                  <?php if ( $redux['wp1v2'] == 1 && $redux['wp1v3'] == 1 ) { echo ' | '; } ?>
                  <?php if ( $redux['wp1v3'] == 1 ) { echo get_the_date(); } ?></p>
               </div>
               <?php endif; ?>
            </div>
            <?php else : ?>
            <h2 class="my-3"><a class="text-reset text-decoration-none" 
            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo get_the_excerpt(); ?></p>
            <p><?php if ( $redux['wp1v2'] == 1 ) { echo get_the_author(); } ?>
            <?php if ( $redux['wp1v2'] == 1 && $redux['wp1v3'] == 1 ) { echo ' | '; } ?>
            <?php if ( $redux['wp1v3'] == 1 ) { echo get_the_date(); } ?></p>
            <?php endif; ?>
         </div>

         <?php endwhile; ?>

      </div>
      
      <span class="ars1"></span>
      <div class="archivemore text-center pb-2">
         <a class="btn btn-outline-primary btn-lg rounded-pill mb-3" href="javascript:void(0)">Więcej</a>
      </div>

      <div class="paginate text-center pb-2">
         <?php pagination(); ?>
      </div>

      <?php endif; ?>

   </div>

</section>

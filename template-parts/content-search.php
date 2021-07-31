<?php global $redux ?>

<section id="search" class="std side py-5">

   <div class="container p-4 p-md-5 text-center">

      <h2 class="my-3">Wyniki Wyszukiwania: “<?php the_search_query() ?>”</h2>

      <?php $query = new WP_Query( array( 'posts_per_page' => $redux['sen'], 
      's' => get_search_query(), 'paged' => get_query_var( 'paged' ) ) ); ?>
      
      <script>
         var searchq = "<?php echo get_search_query() ?>";
         var templateURL = "<?php echo get_template_directory_uri(); ?>";
         var semaxPages = "<?php echo intval( $query->max_num_pages ); ?>";
      </script>
      <script src="<?php echo get_template_directory_uri(); ?>/js/search.js"></script>

      <?php if ( $query->have_posts() ) : ?>

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
               <div class="col-md-9 p-md-3">
                  <h2 class="my-2"><a class="text-reset text-decoration-none" 
                  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
               </div>
               <div class="col-md-3">
                  <div class="image"><a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <?php else : ?>
               <div class="col-md-3">
                  <div class="image"><a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <div class="col-md-9 p-md-3">
                  <h2 class="my-2"><a class="text-reset text-decoration-none" 
                  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
               </div>
               <?php endif; ?>
            </div>
            <?php else : ?>
            <h2 class="my-3"><a class="text-reset text-decoration-none" 
            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo get_the_excerpt(); ?></p>
            <?php endif; ?>
         </div>

         <?php endwhile; ?>

      </div>
      
      <span class="ses1"></span>
      <div class="searchmore text-center pb-2">
         <a class="btn btn-outline-primary btn-lg rounded-pill mb-3" href="javascript:void(0)">Więcej</a>
      </div>

      <div class="paginate text-center pb-2">
         <?php pagination(); ?>
      </div>

      <?php else : ?>

      <p>Nie znaleziono</p>

      <?php endif; ?>

   </div>

</section>

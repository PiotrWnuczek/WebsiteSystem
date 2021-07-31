<?php global $redux ?>

<section id="wp1" class="std content">

   <?php $query = new WP_Query( array( 'post_type' => 'post', 
   'posts_per_page' => $redux['wp1n'] ) ); ?>
   
   <script>
      var templateURL = "<?php echo get_template_directory_uri(); ?>";
      var wp1maxPages = "<?php echo intval( $query->max_num_pages ); ?>";
   </script>
   <script src="<?php echo get_template_directory_uri(); ?>/js/post1.js"></script>

   <?php if ( $query->have_posts() ) : ?>

   <?php if( !empty( $redux['wp1t'] ) || !empty( $redux['wp1p'] ) ) : ?>
   <div class="py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['wp1t'] ?></h2>
         <p><?php echo do_shortcode( $redux['wp1p'] ) ?></p>
      </div>
   </div>
   <?php endif; ?>

   <div class="container-fluid p-5 gray">
      <div class="row no-gutters text-center post">

         <?php while ( $query->have_posts() ) : $query->the_post(); ?>

         <?php if( $redux['wp1v1'] == 1 ) : ?>

         <?php if( $query->current_post != 0 ) : ?>
         <div class="col-md-10 mx-auto px-3 px-md-4">
            <hr class="m-0 p-0">
         </div>
         <?php endif; ?>
         <div class="col-md-10 mx-auto p-3 p-md-4">
            <?php if( has_post_thumbnail() ) : ?>
            <div class="row">
               <?php if( $query->current_post % 2 == 0 ) : ?>
               <div class="col-md-8 p-md-3">
                  <h2 class="my-3"><a class="text-reset text-decoration-none" 
                  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p><?php if ( $redux['wp1v2'] == 1 ) { echo get_the_author(); } ?>
                  <?php if ( ($redux['wp1v2'] == 1 && $redux['wp1v3'] == 1) || 
                  ($redux['wp1v2'] == 1 && $redux['wp1v4'] == 1) ) { echo ' | '; } ?>
                  <?php if ( $redux['wp1v3'] == 1 ) { echo get_the_date(); } ?>
                  <?php if ( $redux['wp1v3'] == 1 && $redux['wp1v4'] == 1 ) { echo ' | '; } ?>
                  <?php if ( $redux['wp1v4'] == 1 ) { foreach(get_the_category() as $category)
                  { echo '<a class="text-reset text-decoration-none" 
                  href="'.get_category_link($category->cat_ID).'">'
                  .$category->cat_name.'</a> '; } } ?></p>
               </div>
               <div class="col-md-4">
                  <div class="image"><a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <?php else : ?>
               <div class="col-md-4">
                  <div class="image"><a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <div class="col-md-8 p-md-3">
                  <h2 class="my-3"><a class="text-reset text-decoration-none" 
                  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p><?php if ( $redux['wp1v2'] == 1 ) { echo get_the_author(); } ?>
                  <?php if ( ($redux['wp1v2'] == 1 && $redux['wp1v3'] == 1) || 
                  ($redux['wp1v2'] == 1 && $redux['wp1v4'] == 1) ) { echo ' | '; } ?>
                  <?php if ( $redux['wp1v3'] == 1 ) { echo get_the_date(); } ?>
                  <?php if ( $redux['wp1v3'] == 1 && $redux['wp1v4'] == 1 ) { echo ' | '; } ?>
                  <?php if ( $redux['wp1v4'] == 1 ) { foreach(get_the_category() as $category)
                  { echo '<a class="text-reset text-decoration-none" 
                  href="'.get_category_link($category->cat_ID).'">'
                  .$category->cat_name.'</a> '; } } ?></p>
               </div>
               <?php endif; ?>
            </div>
            <?php else : ?>
            <h2 class="my-3"><a class="text-reset text-decoration-none" 
            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo get_the_excerpt(); ?></p>
            <p><?php if ( $redux['wp1v2'] == 1 ) { echo get_the_author(); } ?>
            <?php if ( ($redux['wp1v2'] == 1 && $redux['wp1v3'] == 1) || 
            ($redux['wp1v2'] == 1 && $redux['wp1v4'] == 1) ) { echo ' | '; } ?>
            <?php if ( $redux['wp1v3'] == 1 ) { echo get_the_date(); } ?>
            <?php if ( $redux['wp1v3'] == 1 && $redux['wp1v4'] == 1 ) { echo ' | '; } ?>
            <?php if ( $redux['wp1v4'] == 1 ) { foreach(get_the_category() as $category)
            { echo '<a class="text-reset text-decoration-none" 
            href="'.get_category_link($category->cat_ID).'">'
            .$category->cat_name.'</a> '; } } ?></p>
            <?php endif; ?>
         </div>

         <?php else : ?>

         <div class="col-md-6 mx-auto p-3 p-md-4">
            <?php if( has_post_thumbnail() ) : ?>
            <div class="row">
               <div class="col-md-5">
                  <div class="image"><a href="<?php the_permalink(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <div class="col-md-7">
                  <h2 class="my-3"><a class="text-reset text-decoration-none" 
                  href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p><?php if ( $redux['wp1v2'] == 1 ) { echo get_the_author(); } ?>
                  <?php if ( ($redux['wp1v2'] == 1 && $redux['wp1v3'] == 1) || 
                  ($redux['wp1v2'] == 1 && $redux['wp1v4'] == 1) ) { echo ' | '; } ?>
                  <?php if ( $redux['wp1v3'] == 1 ) { echo get_the_date(); } ?>
                  <?php if ( $redux['wp1v3'] == 1 && $redux['wp1v4'] == 1 ) { echo ' | '; } ?>
                  <?php if ( $redux['wp1v4'] == 1 ) { foreach(get_the_category() as $category)
                  { echo '<a class="text-reset text-decoration-none" 
                  href="'.get_category_link($category->cat_ID).'">'
                  .$category->cat_name.'</a> '; } } ?></p>
               </div>
            </div>
            <?php else : ?>
            <h2 class="my-3"><a class="text-reset text-decoration-none" 
            href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo get_the_excerpt(); ?></p>
            <p><?php if ( $redux['wp1v2'] == 1 ) { echo get_the_author(); } ?>
            <?php if ( ($redux['wp1v2'] == 1 && $redux['wp1v3'] == 1) || 
            ($redux['wp1v2'] == 1 && $redux['wp1v4'] == 1) ) { echo ' | '; } ?>
            <?php if ( $redux['wp1v3'] == 1 ) { echo get_the_date(); } ?>
            <?php if ( $redux['wp1v3'] == 1 && $redux['wp1v4'] == 1 ) { echo ' | '; } ?>
            <?php if ( $redux['wp1v4'] == 1 ) { foreach(get_the_category() as $category)
            { echo '<a class="text-reset text-decoration-none" 
            href="'.get_category_link($category->cat_ID).'">'
            .$category->cat_name.'</a> '; } } ?></p>
            <?php endif; ?>
         </div>

         <?php endif; ?>

         <?php endwhile; ?>

      </div>
   </div>
   
   <span class="wp1s1"></span>
   <div class="wp1more text-center gray pb-3">
      <a class="btn btn-outline-primary btn-lg rounded-pill mb-3" href="javascript:void(0)">Więcej</a>
   </div>
   
   <div class="paginate text-center gray pb-3">
      <?php pagination(); ?>
   </div>

   <?php endif; ?>

   <?php echo $redux['wp1html'] ?>
   <style>
      <?php echo $redux['wp1css'] ?>
   </style>

</section>

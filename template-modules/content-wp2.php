<?php global $redux ?>

<section id="wp2" class="std content">

   <?php $query = new WP_Query( array( 'post_type' => 'postp', 
   'posts_per_page' => $redux['wp2n'] ) ); ?>
   
   <script>
      var templateURL = "<?php echo get_template_directory_uri(); ?>";
      var wp2maxPages = "<?php echo intval( $query->max_num_pages ); ?>";
   </script>
   <script src="<?php echo get_template_directory_uri(); ?>/js/post2.js"></script>

   <?php if ( $query->have_posts() ) : ?>

   <?php if( !empty( $redux['wp2t'] ) || !empty( $redux['wp2p'] ) ) : ?>
   <div class="py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['wp2t'] ?></h2>
         <p><?php echo do_shortcode( $redux['wp2p'] ) ?></p>
      </div>
   </div>
   <?php endif; ?>

   <div class="container-fluid p-5 gray">
      <div class="row no-gutters text-center project">

         <?php while ( $query->have_posts() ) : $query->the_post(); ?>

         <?php if( $redux['wp2v1'] == 1 ) : ?>

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
                  <h2 class="my-3"><a class="text-reset text-decoration-none" href="" data-toggle="modal" 
                  data-target=".p<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p><?php if ( $redux['wp2v2'] == 1 ) { echo get_the_author(); } ?>
                  <?php if ( $redux['wp2v2'] == 1 && $redux['wp2v3'] == 1 ) { echo ' | '; } ?>
                  <?php if ( $redux['wp2v3'] == 1 ) { echo get_the_date(); } ?></p>
               </div>
               <div class="col-md-4">
                  <div class="image"><a href="" data-toggle="modal" data-target=".p<?php echo get_the_ID(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <?php else : ?>
               <div class="col-md-4">
                  <div class="image"><a href="" data-toggle="modal" data-target=".p<?php echo get_the_ID(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <div class="col-md-8 p-md-3">
                  <h2 class="my-3"><a class="text-reset text-decoration-none" href="" data-toggle="modal" 
                  data-target=".p<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p><?php if ( $redux['wp2v2'] == 1 ) { echo get_the_author(); } ?>
                  <?php if ( $redux['wp2v2'] == 1 && $redux['wp2v3'] == 1 ) { echo ' | '; } ?>
                  <?php if ( $redux['wp2v3'] == 1 ) { echo get_the_date(); } ?></p>
               </div>
               <?php endif; ?>
            </div>
            <?php else : ?>
            <h2 class="my-3"><a class="text-reset text-decoration-none" href="" data-toggle="modal" 
            data-target=".p<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo get_the_excerpt(); ?></p>
            <p><?php if ( $redux['wp2v2'] == 1 ) { echo get_the_author(); } ?>
            <?php if ( $redux['wp2v2'] == 1 && $redux['wp2v3'] == 1 ) { echo ' | '; } ?>
            <?php if ( $redux['wp2v3'] == 1 ) { echo get_the_date(); } ?></p>
            <?php endif; ?>
         </div>

         <?php else : ?>

         <div class="col-md-6 mx-auto p-3 p-md-4">
            <?php if( has_post_thumbnail() ) : ?>
            <div class="row">
               <div class="col-md-5">
                  <div class="image"><a href="" data-toggle="modal" data-target=".p<?php echo get_the_ID(); ?>">
                  <?php the_post_thumbnail('post-thumbnail', 
                  array('class' => 'img-fluid w-100 h-100')); ?>
                  </a></div>
               </div>
               <div class="col-md-7">
                  <h2 class="my-3"><a class="text-reset text-decoration-none" href="" data-toggle="modal" 
                  data-target=".p<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h2>
                  <p><?php echo get_the_excerpt(); ?></p>
                  <p><?php if ( $redux['wp2v2'] == 1 ) { echo get_the_author(); } ?>
                  <?php if ( $redux['wp2v2'] == 1 && $redux['wp2v3'] == 1 ) { echo ' | '; } ?>
                  <?php if ( $redux['wp2v3'] == 1 ) { echo get_the_date(); } ?></p>
               </div>
            </div>
            <?php else : ?>
            <h2 class="my-3"><a class="text-reset text-decoration-none" href="" 
            data-toggle="modal" data-target=".p<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h2>
            <p><?php echo get_the_excerpt(); ?></p>
            <p><?php if ( $redux['wp2v2'] == 1 ) { echo get_the_author(); } ?>
            <?php if ( $redux['wp2v2'] == 1 && $redux['wp2v3'] == 1 ) { echo ' | '; } ?>
            <?php if ( $redux['wp2v3'] == 1 ) { echo get_the_date(); } ?></p>
            <?php endif; ?>
         </div>

         <?php endif; ?>

         <div class="modal fade p<?php echo get_the_ID(); ?>" tabindex="-1" role="dialog" 
         aria-labelledby="Modal" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered">
               <div class="modal-content text-center">
                  <div class="modal-header">
                     <h3 class="m-0"><?php the_title(); ?></h3>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="content modal-body">
                     <?php the_content(); ?>
                  </div>
                  <div class="modal-footer text-muted">
                     <?php if ( $redux['wp2v2'] == 1 ) { echo get_the_author(); } ?>
                     <?php if ( $redux['wp2v2'] == 1 && $redux['wp2v3'] == 1 ) { echo ' | '; } ?>
                     <?php if ( $redux['wp2v3'] == 1 ) { echo get_the_date(); } ?>
                  </div>
               </div>
            </div>
         </div>

         <?php endwhile; ?>

      </div>
   </div>
   
   <span class="wp2s1"></span>
   <div class="wp2more text-center gray pb-3">
      <a class="btn btn-outline-primary btn-lg rounded-pill mb-3" href="javascript:void(0)">Więcej</a>
   </div>
   
   <div class="paginate text-center gray pb-3">
      <?php pagination(); ?>
   </div>

   <?php endif; ?>

   <?php echo $redux['wp2html'] ?>
   <style>
      <?php echo $redux['wp2css'] ?>
   </style>

</section>

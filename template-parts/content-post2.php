<?php

global $redux;
define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');

$page = 0;

if ( isset($_GET['page']) ) {
   $page = $_GET['page'];
}

query_posts( array(
   'posts_per_page' => $redux['wp2n'],
   'paged' => $page,
   'post_type' => 'postp',
) );

?>

<?php while ( have_posts() ) : the_post(); ?>

<?php if( $redux['wp2v1'] == 1 ) : ?>

<div class="col-md-10 mx-auto px-3 px-md-4">
   <hr class="m-0 p-0">
</div>
<div class="col-md-10 mx-auto p-3 p-md-4">
   <?php if( has_post_thumbnail() ) : ?>
   <div class="row">
      <?php if( $wp_query->current_post % 2 == $redux['wp2n'] % 2 ) : ?>
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
   <h2 class="my-3"><a class="text-reset text-decoration-none" href="" data-toggle="modal" 
   data-target=".p<?php echo get_the_ID(); ?>"><?php the_title(); ?></a></h2>
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

<?php

wp_reset_query();

?>

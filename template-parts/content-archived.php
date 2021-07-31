<?php

define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');

$page = 0;

if (isset($_GET['cat'])) {
   $cat = $_GET['cat'];
}

if ( isset($_GET['page']) ) {
   $page = $_GET['page'];
}

query_posts( array(
   'posts_per_page' => $redux['arn'],
   'paged' => $page,
   'cat' => $cat,
) );

?>

<?php while ( have_posts() ) : the_post(); ?>

<div class="col-md-12 mx-auto px-3 px-md-4">
   <hr class="m-0 p-0">
</div>
<div class="col-md-12 mx-auto p-3 p-md-4">
   <?php if( has_post_thumbnail() ) : ?>
   <div class="row">
      <?php if( $wp_query->current_post % 2 == $redux['arn'] % 2 ) : ?>
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

<?php

wp_reset_query();

?>

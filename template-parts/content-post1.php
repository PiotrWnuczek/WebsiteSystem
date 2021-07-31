<?php

global $redux;
define('WP_USE_THEMES', false);
require_once('../../../../wp-load.php');

$page = 0;

if ( isset($_GET['page']) ) {
   $page = $_GET['page'];
}

query_posts( array(
   'posts_per_page' => $redux['wp1n'],
   'paged' => $page,
   'post_type' => 'post',
) );

?>

<?php while ( have_posts() ) : the_post(); ?>

<?php if( $redux['wp1v1'] == 1 ) : ?>

<div class="col-md-10 mx-auto px-3 px-md-4">
   <hr class="m-0 p-0">
</div>
<div class="col-md-10 mx-auto p-3 p-md-4">
   <?php if( has_post_thumbnail() ) : ?>
   <div class="row">
      <?php if( $wp_query->current_post % 2 == $redux['wp1n'] % 2 ) : ?>
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
         .$category->cat_name.'</a>'; } } ?></p>
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
         .$category->cat_name.'</a>'; } } ?></p>
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
   .$category->cat_name.'</a>'; } } ?></p>
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
         .$category->cat_name.'</a>'; } } ?></p>
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
   .$category->cat_name.'</a>'; } } ?></p>
   <?php endif; ?>
</div>

<?php endif; ?>

<?php endwhile; ?>

<?php

wp_reset_query();

?>

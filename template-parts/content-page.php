<?php global $redux ?>

<?php if ( 
   ( function_exists('is_cart') ) &&  
   ( is_cart() || is_checkout() || is_account_page() ) 
) : ?>

<?php if( !is_elementor() ) : ?>
<section id="page" class="std side pb-5">
<?php endif; ?>

   <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="nav-link d-lg-none px-3 mx-auto" data-toggle="collapse" data-target="#menu2" 
      aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fas fa-bars"></i>
      </a>
      <div class="collapse navbar-collapse" id="menu2">
         <div class="navbar-nav mx-auto">
            <?php if( $redux['sf2'] == 1 ) : ?>
            <div class="my-4 my-lg-auto px-2 px-lg-3"><?php get_product_search_form() ?></div>
            <?php endif; ?>
            <?php $defaults = array(
               'theme_location'  => 'menu2',
               'menu_class'      => 'navbar-nav ml-auto',
               'items_wrap'      => '<div class="%2$s">%3$s</div>',
               'depth'           => 2,
               'walker'          => new wp_bootstrap_navwalker(),
               'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
            );
            wp_nav_menu( $defaults ); ?>
         </div>
      </div>
   </nav>

<?php else : ?>

<?php if( !is_elementor() ) : ?>
<section id="page" class="std side py-5">
<?php endif; ?>

<?php endif; ?>

   <?php if( !is_elementor() ) : ?>
   <div class="container p-4 p-md-5 text-center">
   <?php endif; ?>

      <?php while ( have_posts() ) : the_post(); ?>
      
      <?php if( !is_elementor() ) : ?>

      <?php if( has_excerpt() ) : ?>

      <?php if( has_post_thumbnail() ) : ?>
      <div class="row pb-3">
         <div class="col-md-7 p-md-3 py-md-5">
            <h2 class="my-3"><?php the_title(); ?></h2>
            <p><?php echo get_the_excerpt(); ?></p>
         </div>
         <div class="col-md-5">
         <?php the_post_thumbnail('post-thumbnail', 
         array('class' => 'img-fluid w-100 h-100')); ?>
         </div>
      </div>
      <hr>
      <?php else : ?>
      <h2 class="my-3"><?php the_title(); ?></h2>
      <p><?php echo get_the_excerpt(); ?></p>
      <hr>
      <?php endif; ?>

      <?php else : ?>

      <?php if( has_post_thumbnail() ) : ?>
      <h2 class="my-3"><?php the_title(); ?></h2>
      <div class="row pb-3">
         <div class="col-md-7 mx-auto">
         <?php the_post_thumbnail('post-thumbnail', 
         array('class' => 'img-fluid w-100 h-100')); ?>
         </div>
      </div>
      <?php else : ?>
      <h2 class="my-3"><?php the_title(); ?></h2>
      <?php endif; ?>

      <?php endif; ?>

      <?php endif; ?>
      
      <div class="content text">
         <?php the_content(); ?>
      </div>

      <?php endwhile; ?>

   <?php if( !is_elementor() ) : ?>
   </div>
   
</section>
<?php endif; ?>

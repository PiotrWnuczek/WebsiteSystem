<?php global $redux ?>

<?php if( !is_elementor() ) : ?>
<section id="woocommerce" class="std side pb-5">
<?php else : ?>
<section id="woocommerce">
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

   <?php if( !is_elementor() ) : ?>
   <div class="content container p-4 p-md-5 text-center">
   <?php endif; ?>

      <?php woocommerce_content(); ?>

   <?php if( !is_elementor() ) : ?>
   </div>
   <?php endif; ?>

</section>

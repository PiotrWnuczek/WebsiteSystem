<?php global $redux ?>

<section id="ws5" class="content">
   
   <?php if( !empty( $redux['ws5t'] ) || !empty( $redux['ws5p'] ) ) : ?>
   <div class="std py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['ws5t'] ?></h2>
         <p><?php echo do_shortcode( $redux['ws5p'] ) ?></p>
         <?php if( $redux['ws5v1'] == 1 ) : ?>
         <?php echo do_shortcode( $redux['ws5c'] ) ?>
         <?php endif; ?>
      </div>
   </div>
   <?php endif; ?>
   
   <?php if( $redux['ws5v1'] == 2 ) : ?>
   <?php echo do_shortcode( $redux['ws5c'] ) ?>
   <?php endif; ?>
   
   <?php if ( is_active_sidebar(5) ) : ?>
   
   <div class="aside py-5 gray">

   <?php dynamic_sidebar(5); ?>
   
   </div>

   <?php endif; ?>
   
   <?php echo $redux['ws5html'] ?>
   <style>
      <?php echo $redux['ws5css'] ?>
   </style>

</section>

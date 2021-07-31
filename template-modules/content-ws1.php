<?php global $redux ?>

<section id="ws1" class="content">
   
   <?php if( !empty( $redux['ws1t'] ) || !empty( $redux['ws1p'] ) ) : ?>
   <div class="std py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['ws1t'] ?></h2>
         <p><?php echo do_shortcode( $redux['ws1p'] ) ?></p>
         <?php if( $redux['ws1v1'] == 1 ) : ?>
         <?php echo do_shortcode( $redux['ws1c'] ) ?>
         <?php endif; ?>
      </div>
   </div>
   <?php endif; ?>
   
   <?php if( $redux['ws1v1'] == 2 ) : ?>
   <?php echo do_shortcode( $redux['ws1c'] ) ?>
   <?php endif; ?>
   
   <?php if ( is_active_sidebar(1) ) : ?>
   
   <div class="aside py-5 gray">

   <?php dynamic_sidebar(1); ?>
   
   </div>

   <?php endif; ?>
   
   <?php echo $redux['ws1html'] ?>
   <style>
      <?php echo $redux['ws1css'] ?>
   </style>

</section>

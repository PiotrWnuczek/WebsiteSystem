<?php global $redux ?>

<section id="ws2" class="content">
   
   <?php if( !empty( $redux['ws2t'] ) || !empty( $redux['ws2p'] ) ) : ?>
   <div class="std py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['ws2t'] ?></h2>
         <p><?php echo do_shortcode( $redux['ws2p'] ) ?></p>
         <?php if( $redux['ws2v1'] == 1 ) : ?>
         <?php echo do_shortcode( $redux['ws2c'] ) ?>
         <?php endif; ?>
      </div>
   </div>
   <?php endif; ?>
   
   <?php if( $redux['ws2v1'] == 2 ) : ?>
   <?php echo do_shortcode( $redux['ws2c'] ) ?>
   <?php endif; ?>
   
   <?php if ( is_active_sidebar(2) ) : ?>
   
   <div class="aside py-5 gray">

   <?php dynamic_sidebar(2); ?>
   
   </div>

   <?php endif; ?>
   
   <?php echo $redux['ws2html'] ?>
   <style>
      <?php echo $redux['ws2css'] ?>
   </style>

</section>

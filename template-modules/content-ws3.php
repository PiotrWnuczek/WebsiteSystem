<?php global $redux ?>

<section id="ws3" class="content">
   
   <?php if( !empty( $redux['ws3t'] ) || !empty( $redux['ws3p'] ) ) : ?>
   <div class="std py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['ws3t'] ?></h2>
         <p><?php echo do_shortcode( $redux['ws3p'] ) ?></p>
         <?php if( $redux['ws3v1'] == 1 ) : ?>
         <?php echo do_shortcode( $redux['ws3c'] ) ?>
         <?php endif; ?>
      </div>
   </div>
   <?php endif; ?>
   
   <?php if( $redux['ws3v1'] == 2 ) : ?>
   <?php echo do_shortcode( $redux['ws3c'] ) ?>
   <?php endif; ?>
   
   <?php if ( is_active_sidebar(3) ) : ?>
   
   <div class="aside py-5 gray">

   <?php dynamic_sidebar(3); ?>
   
   </div>

   <?php endif; ?>
   
   <?php echo $redux['ws3html'] ?>
   <style>
      <?php echo $redux['ws3css'] ?>
   </style>

</section>

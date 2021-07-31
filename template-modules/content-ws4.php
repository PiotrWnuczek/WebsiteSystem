<?php global $redux ?>

<section id="ws4" class="content">
   
   <?php if( !empty( $redux['ws4t'] ) || !empty( $redux['ws4p'] ) ) : ?>
   <div class="std py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['ws4t'] ?></h2>
         <p><?php echo do_shortcode( $redux['ws4p'] ) ?></p>
         <?php if( $redux['ws4v1'] == 1 ) : ?>
         <?php echo do_shortcode( $redux['ws4c'] ) ?>
         <?php endif; ?>
      </div>
   </div>
   <?php endif; ?>
   
   <?php if( $redux['ws4v1'] == 2 ) : ?>
   <?php echo do_shortcode( $redux['ws4c'] ) ?>
   <?php endif; ?>
   
   <?php if ( is_active_sidebar(4) ) : ?>
   
   <div class="aside py-5 gray">

   <?php dynamic_sidebar(4); ?>
   
   </div>

   <?php endif; ?>
   
   <?php echo $redux['ws4html'] ?>
   <style>
      <?php echo $redux['ws4css'] ?>
   </style>

</section>

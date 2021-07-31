<?php global $redux ?>

<section id="it1" class="std content">

   <?php if ( isset( $redux['it1c'] ) && !empty( $redux['it1c'] ) 
   && $redux['it1c'][0]['title']!='' ) : ?>

   <?php if( !empty( $redux['it1t'] ) || !empty( $redux['it1p'] ) ) : ?>
   <div class="py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['it1t'] ?></h2>
         <p><?php echo do_shortcode( $redux['it1p'] ) ?></p>
      </div>
   </div>
   <?php endif; ?>

   <div class="container-fluid p-5 gray">
      <div class="row no-gutters text-center iconboxes">

         <?php if ( isset( $redux['it1c'] ) && !empty( $redux['it1c'] ) 
         && $redux['it1c'][0]['title']!='' ) : ?>

         <?php foreach( $redux['it1c'] as $key => $box ) { ?>
         
         <div class="col-md-6 mx-auto p-3 p-md-4">
            <i class="<?php echo $box['url'] ?>"></i>
            <h3><?php echo $box['title'] ?></h3>
            <p><?php echo do_shortcode( $box['description'] ) ?></p>
         </div>

         <?php } ?>

         <?php endif; ?>

      </div>
   </div>

   <?php endif; ?>

   <?php echo $redux['it1html'] ?>
   <style>
      <?php echo $redux['it1css'] ?>
   </style>

</section>

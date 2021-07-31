<?php global $redux ?>

<section id="it2" class="std content">

   <?php if ( isset( $redux['it2c'] ) && !empty( $redux['it2c'] ) 
   && $redux['it2c'][0]['title']!='' ) : ?>

   <?php if( !empty( $redux['it2t'] ) || !empty( $redux['it2p'] ) ) : ?>
   <div class="py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['it2t'] ?></h2>
         <p><?php echo do_shortcode( $redux['it2p'] ) ?></p>
      </div>
   </div>
   <?php endif; ?>

   <div class="container-fluid p-5 gray">
      <div class="row no-gutters text-center iconboxes">

         <?php if ( isset( $redux['it2c'] ) && !empty( $redux['it2c'] ) 
         && $redux['it2c'][0]['title']!='' ) : ?>

         <?php foreach( $redux['it2c'] as $key => $box ) { ?>

         <div class="col-md-4 mx-auto p-3 p-md-4">
            <h3><i class="<?php echo $box['url'] ?> mr-3"></i>
               <?php echo $box['title'] ?></h3>
            <p><?php echo do_shortcode( $box['description'] ) ?></p>
         </div>

         <?php } ?>

         <?php endif; ?>

      </div>
   </div>

   <?php endif; ?>

   <?php echo $redux['it2html'] ?>
   <style>
      <?php echo $redux['it2css'] ?>
   </style>

</section>

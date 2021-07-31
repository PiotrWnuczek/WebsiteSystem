<?php global $redux ?>

<section id="gt2" class="std content">

   <?php if ( isset( $redux['gt2c'] ) && !empty( $redux['gt2c'] ) 
   && $redux['gt2c'][0]['title']!='' ) : ?>

   <?php if( !empty( $redux['gt2t'] ) || !empty( $redux['gt2p'] ) ) : ?>
   <div class="py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['gt2t'] ?></h2>
         <p><?php echo do_shortcode( $redux['gt2p'] ) ?></p>
      </div>
   </div>
   <?php endif; ?>

   <div class="container-fluid p-5 gray">
      <div class="row no-gutters text-center iconboxes">

         <?php if ( isset( $redux['gt2c'] ) && !empty( $redux['gt2c'] ) 
         && $redux['gt2c'][0]['title']!='' ) : ?>

         <?php foreach( $redux['gt2c'] as $key => $box ) { ?>

         <div class="col-md-6 mx-auto p-3 p-md-4">
            <div class="row">
               <div class="col-md-5">
                  <img src="<?php echo $box['image'] ?>" class="card-img w-100 h-100">
               </div>
               <div class="col-md-7">
                  <h2 class="my-3"><?php echo $box['title'] ?></h2>
                  <p><?php echo do_shortcode( $box['description'] ) ?></p>
               </div>
            </div>
         </div>

         <?php } ?>

         <?php endif; ?>

      </div>
   </div>

   <?php endif; ?>

   <?php echo $redux['gt2html'] ?>
   <style>
      <?php echo $redux['gt2css'] ?>
   </style>

</section>

<?php global $redux ?>

<section id="gt1" class="std content">

   <?php if ( isset( $redux['gt1c'] ) && !empty( $redux['gt1c'] ) 
   && $redux['gt1c'][0]['title']!='' ) : ?>

   <?php if( !empty( $redux['gt1t'] ) || !empty( $redux['gt1p'] ) ) : ?>
   <div class="py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['gt1t'] ?></h2>
         <p><?php echo do_shortcode( $redux['gt1p'] ) ?></p>
      </div>
   </div>
   <?php endif; ?>

   <div class="container-fluid p-5 gray">
      <div class="row no-gutters text-center iconboxes">

         <?php if ( isset( $redux['gt1c'] ) && !empty( $redux['gt1c'] ) 
         && $redux['gt1c'][0]['title']!='' ) : ?>

         <?php foreach( $redux['gt1c'] as $key => $box ) { ?>

         <?php if( $key != 0 ) : ?>
         <div class="col-md-10 mx-auto px-3 px-md-4">
            <hr class="m-0 p-0">
         </div>
         <?php endif; ?>
         <div class="col-md-10 mx-auto p-3 p-md-4">
            <div class="row">
               <?php if( $key % 2 == 0 ) : ?>
               <div class="col-md-8 p-md-3">
                  <h2 class="my-3"><?php echo $box['title'] ?></h2>
                  <p><?php echo do_shortcode( $box['description'] ) ?></p>
               </div>
               <div class="col-md-4">
                  <img src="<?php echo $box['image'] ?>" class="card-img w-100 h-100">
               </div>
               <?php else : ?>
               <div class="col-md-4">
                  <img src="<?php echo $box['image'] ?>" class="card-img w-100 h-100">
               </div>
               <div class="col-md-8 p-md-3">
                  <h2 class="my-3"><?php echo $box['title'] ?></h2>
                  <p><?php echo do_shortcode( $box['description'] ) ?></p>
               </div>
               <?php endif; ?>
            </div>
         </div>

         <?php } ?>

         <?php endif; ?>

      </div>
   </div>

   <?php endif; ?>

   <?php echo $redux['gt1html'] ?>
   <style>
      <?php echo $redux['gt1css'] ?>
   </style>

</section>

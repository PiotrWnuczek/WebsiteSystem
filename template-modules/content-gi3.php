<?php global $redux ?>

<section id="gi3" class="std content">

   <?php if( !empty( $redux['gi3t'] ) || !empty( $redux['gi3p'] ) ) : ?>
   <div class="py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['gi3t'] ?></h2>
         <p><?php echo do_shortcode( $redux['gi3p'] ) ?></p>
      </div>
   </div>
   <?php endif; ?>

   <div class="container-fluid p-0 gray">
      <div class="row no-gutters">
         <div class="col-md-5">
            <?php if( !empty( $redux['gi3g']['url'] ) ) : ?>
            <img src="<?php echo $redux['gi3g']['url']; ?>" class="img-fluid w-100 h-100">
            <?php else : ?>
            <img src="<?php bloginfo('template_url'); ?>/img/image.jpg" class="img-fluid w-100 h-100">
            <?php endif; ?>
         </div>
         <div class="col-md-7">
            <div class="row no-gutters py-3 text-center iconboxes">
               <div class="col-md-6 p-3 p-md-4">
                  <i class="<?php echo $redux['gi3i1'] ?>"></i>
                  <h3><?php echo $redux['gi3t1'] ?></h3>
                  <p><?php echo do_shortcode( $redux['gi3p1'] ) ?></p>
               </div>
               <div class="col-md-6 p-3 p-md-4">
                  <i class="<?php echo $redux['gi3i2'] ?>"></i>
                  <h3><?php echo $redux['gi3t2'] ?></h3>
                  <p><?php echo do_shortcode( $redux['gi3p2'] ) ?></p>
               </div>
               <div class="col-md-6 p-3 p-md-4">
                  <i class="<?php echo $redux['gi3i3'] ?>"></i>
                  <h3><?php echo $redux['gi3t3'] ?></h3>
                  <p><?php echo do_shortcode( $redux['gi3p3'] ) ?></p>
               </div>
               <div class="col-md-6 p-3 p-md-4">
                  <i class="<?php echo $redux['gi3i4'] ?>"></i>
                  <h3><?php echo $redux['gi3t4'] ?></h3>
                  <p><?php echo do_shortcode( $redux['gi3p4'] ) ?></p>
               </div>
            </div>
         </div>
      </div>
   </div>

   <?php echo $redux['gi3html'] ?>
   <style>
      <?php echo $redux['gi3css'] ?>
   </style>

</section>

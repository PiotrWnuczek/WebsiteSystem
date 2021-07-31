<?php global $redux ?>

<section id="gi2" class="std content">

   <?php if( !empty( $redux['gi2t'] ) || !empty( $redux['gi2p'] ) ) : ?>
   <div class="py-5 white">
      <div class="container p-4 p-md-5 text-center position-relative">
         <h2><?php echo $redux['gi2t'] ?></h2>
         <p><?php echo do_shortcode( $redux['gi2p'] ) ?></p>
      </div>
   </div>
   <?php endif; ?>

   <div class="container-fluid p-0 gray">
      <div class="row no-gutters">
         <div class="col-md-7">
            <div class="row no-gutters py-3 text-center iconboxes">
               <div class="col-md-6 p-3 p-md-4">
                  <i class="<?php echo $redux['gi2i1'] ?>"></i>
                  <h3><?php echo $redux['gi2t1'] ?></h3>
                  <p><?php echo do_shortcode( $redux['gi2p1'] ) ?></p>
               </div>
               <div class="col-md-6 p-3 p-md-4">
                  <i class="<?php echo $redux['gi2i2'] ?>"></i>
                  <h3><?php echo $redux['gi2t2'] ?></h3>
                  <p><?php echo do_shortcode( $redux['gi2p2'] ) ?></p>
               </div>
               <div class="col-md-6 p-3 p-md-4">
                  <i class="<?php echo $redux['gi2i3'] ?>"></i>
                  <h3><?php echo $redux['gi2t3'] ?></h3>
                  <p><?php echo do_shortcode( $redux['gi2p3'] ) ?></p>
               </div>
               <div class="col-md-6 p-3 p-md-4">
                  <i class="<?php echo $redux['gi2i4'] ?>"></i>
                  <h3><?php echo $redux['gi2t4'] ?></h3>
                  <p><?php echo do_shortcode( $redux['gi2p4'] ) ?></p>
               </div>
            </div>
         </div>
         <div class="col-md-5">
            <?php if( !empty( $redux['gi2g']['url'] ) ) : ?>
            <img src="<?php echo $redux['gi2g']['url']; ?>" class="img-fluid w-100 h-100">
            <?php else : ?>
            <img src="<?php bloginfo('template_url'); ?>/img/image.jpg" class="img-fluid w-100 h-100">
            <?php endif; ?>
         </div>
      </div>
   </div>

   <?php echo $redux['gi2html'] ?>
   <style>
      <?php echo $redux['gi2css'] ?>
   </style>

</section>

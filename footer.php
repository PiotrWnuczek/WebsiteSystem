<?php global $redux ?>

<footer id="footer" class="std content">

   <div class="py-5">
      <div class="container p-4 p-md-5 text-center position-relative">
         
      <?php if( $redux['ki1v1'] == 1 ) : ?>
        
         <div id="ki1">
         
         <h2><?php echo $redux['ki1t'] ?></h2>
         <p><?php echo do_shortcode( $redux['ki1p'] ) ?></p>
         <?php if( $redux['ki1v2'] == 1 ) : ?>
         <?php if( shortcode_exists('contact-form-7') ) : ?>
         <?php echo do_shortcode( '[contact-form-7 title="Formularz"]' ) ?>
         <hr class="my-4">
         <?php endif; ?>
         <?php endif; ?>
         
         <?php echo $redux['ki1html'] ?>
         <style>
            <?php echo $redux['ki1css'] ?>
         </style>
         
         </div>
         
      <?php endif; ?>
        
      <?php if( $redux['ki2v1'] == 1 ) : ?>
        
         <div id="ki2">
         
         <p><?php echo do_shortcode( $redux['ki2p1'] ) ?></p>
         <p><?php echo $redux['ki2p2'] ?></p>
         
         <?php echo $redux['ki2html'] ?>
         <style>
            <?php echo $redux['ki2css'] ?>
         </style>
         
         </div>
         
      <?php endif; ?>
         
      <p>
      <a class="text-reset text-decoration-none" 
      href="https://websitesystem.piotrwnuczek.pl/">Website System</a>
      created by
      <a class="text-reset text-decoration-none" 
      href="https://piotrwnuczek.pl/">Piotr Wnuczek</a>
      </p>
         
      </div>
   </div>

</footer>

<script>  
   function iframe() {
   if (window.innerWidth > 768) {
      document.querySelector('#iframe').innerHTML = 
      '<iframe src="https://www.facebook.com/plugins/page.php?href=<?php echo $redux['fbl'] ?>&tabs=timeline&width=340&height=500&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="500" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>'
      };
   };
   window.addEventListener('DOMContentLoaded', iframe);
   window.addEventListener('resize', iframe);
</script>

<?php if( $redux['fbt'] == 1 ) : ?>
<div id="my-tab1">
   <span class="handle" id="fb">FACEBOOK</span>
   <div id="iframe"></div>
</div>
<?php endif; ?>

<?php if( $redux['ses'] == 1 ) : ?>
<div class="modal fade modal1" tabindex="-1" role="dialog" aria-labelledby="ModalLabel" aria-hidden="true">
   <div class="modal-dialog modal-lg">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title">Wyszukiwarka</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <script async src="https://cse.google.com/cse.js?cx=<?php echo $redux['sea'] ?>"></script>
            <div class="gcse-search"></div>
         </div>
      </div>
   </div>
</div>
<?php endif; ?>

<?php echo $redux['gac'] ?>
<?php echo $redux['fpc'] ?>
<?php echo $redux['mlc'] ?>

<?php wp_footer(); ?>

<?php echo $redux['htmlb'] ?>

</body>

</html>

<?php get_header(); ?>

<?php

global $redux;

$layout = $redux['sort']['Aktywne'];

if ($layout): foreach ($layout as $key=>$value) {

   switch($key) {

      case 'gi1': get_template_part( 'template-modules/content', 'gi1' );
      break;

      case 'gi2': get_template_part( 'template-modules/content', 'gi2' );
      break;

      case 'gi3': get_template_part( 'template-modules/content', 'gi3' );    
      break;

      case 'gt1': get_template_part( 'template-modules/content', 'gt1' );    
      break;
         
      case 'gt2': get_template_part( 'template-modules/content', 'gt2' );
      break;
         
      case 'it1': get_template_part( 'template-modules/content', 'it1' );
      break;
         
      case 'it2': get_template_part( 'template-modules/content', 'it2' );
      break;
         
      case 'wp1': get_template_part( 'template-modules/content', 'wp1' );
      break;
         
      case 'wp2': get_template_part( 'template-modules/content', 'wp2' );
      break;
         
      case 'ws1': get_template_part( 'template-modules/content', 'ws1' );
      break;

      case 'ws2': get_template_part( 'template-modules/content', 'ws2' );
      break;

      case 'ws3': get_template_part( 'template-modules/content', 'ws3' );    
      break;

      case 'ws4': get_template_part( 'template-modules/content', 'ws4' );    
      break;
         
      case 'ws5': get_template_part( 'template-modules/content', 'ws5' );
      break;

   }

}

endif;

?>

<?php get_footer(); ?>

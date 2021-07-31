<?php global $redux ?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>

   <title><?php wp_title(); ?></title>

   <meta charset="<?php bloginfo( 'charset' ); ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="X-Ua-Compatible" content="IE=edge,chrome=1">

   <meta property="fb:admins" content="<?php echo $redux['fba'] ?>" />

   <?php if( !empty( $redux['logo']['url'] ) ) : ?>
   <link rel="shortcut icon" href="<?php echo $redux['logo']['url']; ?>">
   <?php else : ?>
   <link rel="shortcut icon" href="<?php bloginfo('template_url'); ?>/img/logo.png">
   <?php endif; ?>

   <?php wp_head(); ?>

   <?php echo $redux['htmlh'] ?>
   <style>
      <?php echo $redux['css'] ?>
      .navbar {
         background: <?php echo $redux['ou1cnb'] ?> !important;
      }
      .nav-link,
      .navbar-brand {
         color: <?php echo $redux['ou1cn'] ?> !important;
      }
      .nav-link:hover {
         background: <?php echo $redux['ou1cnh'] ?>;
      }
      input,
      button {
         color: <?php echo $redux['ou1cs'] ?>;
         border-color: <?php echo $redux['ou1csb'] ?>;
      }
      input::placeholder {
         color: <?php echo $redux['ou1cs'] ?>;
      }
      button {
         background: <?php echo $redux['ou1csb'] ?>;
      }
   </style>

</head>

<body <?php body_class(); ?>>

   <nav id="nav" class="navbar sticky-top navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand m-0 pl-3 pr-2" href="#header">
         <?php if( !empty( $redux['logo']['url'] ) ) : ?>
         <img src="<?php echo $redux['logo']['url']; ?>" width="50" height="50">
         <?php else : ?>
         <img src="<?php bloginfo('template_url'); ?>/img/logo.png" width="50" height="50">
         <?php endif; ?>
      </a>
      <a class="navbar-brand m-0 pl-2 pr-3" href="<?php echo site_url(); ?>">
         <?php bloginfo('name'); ?>
      </a>
      <a class="nav-link d-lg-none px-3" data-toggle="collapse" data-target="#menu1" 
      aria-controls="menu" aria-expanded="false" aria-label="Toggle navigation">
         <i class="fas fa-bars"></i>
      </a>
      <div class="collapse navbar-collapse" id="menu1">
         <div class="navbar-nav ml-auto">

            <?php if( $redux['sf1'] == 1 ) : ?>
            <div class="my-4 my-lg-auto px-2 px-lg-3"><?php get_search_form() ?></div>
            <?php endif; ?>

            <?php $defaults = array(
               'theme_location'  => 'menu1',
               'menu_class'      => 'navbar-nav ml-auto',
               'items_wrap'      => '<div class="%2$s">%3$s</div>',
               'depth'           => 2,
               'walker'          => new wp_bootstrap_navwalker(),
               'fallback_cb'     => 'wp_bootstrap_navwalker::fallback',
            );
            wp_nav_menu( $defaults ); ?>

            <?php if( $redux['fbs'] == 1 ) : ?>
            <a class="nav-link px-3" href="<?php echo $redux['fbl'] ?>" target="_blank">
               <i class="fab fa-facebook-f"></i></a>
            <?php endif; ?>

            <?php if( $redux['igs'] == 1 ) : ?>
            <a class="nav-link px-3" href="<?php echo $redux['igl'] ?>" target="_blank">
               <i class="fab fa-instagram"></i></a>
            <?php endif; ?>

            <?php if( $redux['lis'] == 1 ) : ?>
            <a class="nav-link px-3" href="<?php echo $redux['lil'] ?>" target="_blank">
               <i class="fab fa-linkedin-in"></i></a>
            <?php endif; ?>

            <?php if( $redux['ems'] == 1 ) : ?>
            <a class="nav-link px-3" href="mailto:<?php echo $redux['ema'] ?>">
               <i class="far fa-envelope"></i></a>
            <?php endif; ?>

            <?php if( $redux['ses'] == 1 ) : ?>
            <a class="nav-link px-3" data-toggle="modal" data-target=".modal1">
               <i class="fas fa-search"></i></a>
            <?php endif; ?>

         </div>
      </div>
   </nav>

   <?php if( is_home() ) : ?>

   <header id="header" class="std content">

      <?php if( $redux['sp1v1'] == 1 ) : ?>
      
      <div id="sp1">

      <?php if ( isset( $redux['sp1c'] ) && !empty( $redux['sp1c'] ) 
      && $redux['sp1c'][0]['title']!='' ) : ?>

      <div class="bd-example">
         <div id="carouselExampleCaptions" class="carousel slider slide" data-ride="carousel">
            <ol class="carousel-indicators slider-indicators">

               <?php foreach( $redux['sp1c'] as $key => $box ) { ?>

               <li data-target="#carouselExampleCaptions" data-slide-to="$key" 
               class="<?php if ( $key == 0 ) echo 'active' ?>"></li>

               <?php } ?>

            </ol>
            <div class="carousel-inner slider-inner">

               <?php foreach( $redux['sp1c'] as $key => $box ) { ?>

               <div class="carousel-item slider-item <?php if ( $key == 0 ) echo 'active' ?>">
                  <img src="<?php echo $box['image'] ?>" class="d-block w-100 h-100">
                  <div class="carousel-caption slider-caption">
                     <h1 class="my-3"><a class="text-reset text-decoration-none" 
                     href="<?php echo site_url(); ?>"><?php echo $box['title'] ?></a></h1>
                     <h3 class="my-3"><?php echo do_shortcode( $box['description'] ) ?></h3>
                     <h4 class="my-3"><?php echo $box['url'] ?></h4>
                     <?php if( $redux['sp1v2'] == 1 ) : ?>
                     <a class="btn btn-primary btn-lg rounded-pill mr-2 my-2" 
                     href="<?php echo $redux['sp1b1l'] ?>"<?php if ( $redux['sp1b1n'] == 1 ) 
                     { echo ' target="_blank" '; } ?>><?php echo $redux['sp1b1t'] ?></a>
                     <a class="btn btn-primary btn-lg rounded-pill my-2" 
                     href="<?php echo $redux['sp1b2l'] ?>"<?php if ( $redux['sp1b2n'] == 1 ) 
                     { echo ' target="_blank" '; } ?>><?php echo $redux['sp1b2t'] ?></a>
                     <?php endif; ?>
                  </div>
               </div>

               <?php } ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
            </a>
         </div>
      </div>

      <?php endif; ?>
      
      <?php echo $redux['sp1html'] ?>
      <style>
         <?php echo $redux['sp1css'] ?>
      </style>
      
      </div>

      <?php endif; ?>

      <?php if( $redux['sp2v1'] == 1 ) : ?>
      
      <div id="sp2">

      <div class="jumbotron hero jumbotron-fluid m-0 p-4 p-md-5">
         <div class="container p-4 p-md-5 text-center position-relative">
            <div class="row">
               <div class="col-md-7">
                  <h1 class="my-3"><a class="text-reset text-decoration-none" 
                  href="<?php echo site_url(); ?>"><?php echo $redux['sp2t'] ?></a></h1>
                  <h3 class="my-3"><?php echo do_shortcode( $redux['sp2p1'] ) ?></h3>
                  <h4 class="my-3"><?php echo $redux['sp2p2'] ?></h4>
                  <?php if( $redux['sp2v2'] == 1 ) : ?>
                  <a class="btn btn-outline-primary btn-lg rounded-pill mr-2 my-2" 
                  href="<?php echo $redux['sp2b1l'] ?>"<?php if ( $redux['sp2b1n'] == 1 ) 
                  { echo ' target="_blank" '; } ?>><?php echo $redux['sp2b1t'] ?></a>
                  <a class="btn btn-outline-primary btn-lg rounded-pill my-2" 
                  href="<?php echo $redux['sp2b2l'] ?>"<?php if ( $redux['sp2b2n'] == 1 ) 
                  { echo ' target="_blank" '; } ?>><?php echo $redux['sp2b2t'] ?></a>
                  <?php endif; ?>
               </div>
               <div class="col-md-5">
                  <?php if( !empty( $redux['sp2g']['url'] ) ) : ?>
                  <img class="img-fluid mw-100 mh-100" src="<?php echo $redux['sp2g']['url']; ?>" 
                  width="400" height="400">
                  <?php else : ?>
                  <img class="img-fluid mw-100 mh-100" src="<?php bloginfo('template_url'); ?>/img/logo.png" 
                  width="400" height="400">
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
      
      <?php echo $redux['sp2html'] ?>
      <style>
         <?php echo $redux['sp2css'] ?>
      </style>
      
      </div>

      <?php endif; ?>

   </header>

   <?php else : ?>

   <header id="header" class="std content">

      <?php if( $redux['sp1v1'] == 1 ) : ?>
      
      <div id="sp1">

      <?php if ( isset( $redux['sp1c'] ) && !empty( $redux['sp1c'] ) 
      && $redux['sp1c'][0]['title']!='' ) : ?>

      <div class="bd-example">
         <div id="carouselExampleCaptions" class="carousel slider slide" data-ride="carousel">
            <ol class="carousel-indicators slider-indicators">

               <?php foreach( $redux['sp1c'] as $key => $box ) { ?>

               <li data-target="#carouselExampleCaptions" data-slide-to="$key" 
               class="<?php if ( $key == 0 ) echo 'active' ?>"></li>

               <?php } ?>

            </ol>
            <div class="carousel-inner slider-inner">

               <?php foreach( $redux['sp1c'] as $key => $box ) { ?>

               <div class="carousel-item slider-item short <?php if ( $key == 0 ) echo 'active' ?>">
                  <img src="<?php echo $box['image'] ?>" class="d-block w-100 h-100">
                  <div class="carousel-caption slider-caption small">
                     <h1 class="my-2"><a class="text-reset text-decoration-none" 
                     href="<?php echo site_url(); ?>"><?php echo $box['title'] ?></a></h1>
                     <h3 class="my-2"><?php echo do_shortcode( $box['description'] ) ?></h3>
                     <?php if( $redux['sp1v2'] == 1 ) : ?>
                     <a class="btn btn-primary btn-lg rounded-pill mr-2 my-2" 
                     href="<?php echo $redux['sp1b1l'] ?><?php if ( $redux['sp1b1n'] == 1 ) 
                     { echo ' target="_blank" '; } ?>"><?php echo $redux['sp1b1t'] ?></a>
                     <a class="btn btn-primary btn-lg rounded-pill my-2" 
                     href="<?php echo $redux['sp1b2l'] ?>"<?php if ( $redux['sp1b2n'] == 1 ) 
                     { echo ' target="_blank" '; } ?>><?php echo $redux['sp1b2t'] ?></a>
                     <?php endif; ?>
                  </div>
               </div>

               <?php } ?>

            </div>
            <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
               <span class="carousel-control-prev-icon" aria-hidden="true"></span>
               <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
               <span class="carousel-control-next-icon" aria-hidden="true"></span>
               <span class="sr-only">Next</span>
            </a>
         </div>
      </div>

      <?php endif; ?>
      
      <?php echo $redux['sp1html'] ?>
      <style>
         <?php echo $redux['sp1css'] ?>
      </style>
      
      </div>

      <?php endif; ?>

      <?php if( $redux['sp2v1'] == 1 ) : ?>
      
      <div id="sp2">

      <div class="jumbotron hero jumbotron-fluid m-0 p-4 p-md-5">
         <div class="container p-3 p-md-4 text-center position-relative">
            <div class="row">
               <div class="col-md-7 small">
                  <h1 class="my-2"><a class="text-reset text-decoration-none" 
                  href="<?php echo site_url(); ?>"><?php echo $redux['sp2t'] ?></a></h1>
                  <h3 class="my-2"><?php echo do_shortcode( $redux['sp2p1'] ) ?></h3>
                  <?php if( $redux['sp2v2'] == 1 ) : ?>
                  <a class="btn btn-outline-primary btn-lg rounded-pill mr-2 my-2" 
                  href="<?php echo $redux['sp2b1l'] ?>"<?php if ( $redux['sp2b1n'] == 1 ) 
                  { echo ' target="_blank" '; } ?>><?php echo $redux['sp2b1t'] ?></a>
                  <a class="btn btn-outline-primary btn-lg rounded-pill my-2" 
                  href="<?php echo $redux['sp2b2l'] ?>"<?php if ( $redux['sp2b2n'] == 1 ) 
                  { echo ' target="_blank" '; } ?>><?php echo $redux['sp2b2t'] ?></a>
                  <?php endif; ?>
               </div>
               <div class="col-md-5">
                  <?php if( !empty( $redux['sp2g']['url'] ) ) : ?>
                  <img class="img-fluid mw-100 mh-100" src="<?php echo $redux['sp2g']['url']; ?>" 
                  width="200" height="200">
                  <?php else : ?>
                  <img class="img-fluid mw-100 mh-100" src="<?php bloginfo('template_url'); ?>/img/logo.png" 
                  width="200" height="200">
                  <?php endif; ?>
               </div>
            </div>
         </div>
      </div>
      
      <?php echo $redux['sp2html'] ?>
      <style>
         <?php echo $redux['sp2css'] ?>
      </style>
      
      </div>

      <?php endif; ?>

   </header>

   <?php endif; ?>

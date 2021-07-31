<?php global $redux ?>

<?php if( !is_elementor() ) : ?>
<section id="single" class="std side py-5">
<?php endif; ?>

   <?php if( !is_elementor() ) : ?>
   <div class="container p-4 p-md-5 text-center">
   <?php endif; ?>

      <?php while ( have_posts() ) : the_post(); ?>
      
      <?php if( !is_elementor() ) : ?>

      <?php countPostViews(get_the_ID()); ?>

      <?php if( has_excerpt() ) : ?>

      <?php if( has_post_thumbnail() ) : ?>
      <div class="row pb-3">
         <div class="col-md-7 p-md-3">
            <h2 class="my-3"><?php the_title(); ?></h2>
            <p><?php echo get_the_excerpt(); ?></p>
            <p><?php if ( $redux['s9b1v2'] == 1 ) { echo get_the_author().' | '; } ?>
            <?php if ( $redux['s9b1v3'] == 1 ) { echo get_the_date().' | '; } ?>
            <?php if ( $redux['s9b1v4'] == 1 ) { foreach(get_the_category() as $category) 
            { echo $category->cat_name.' | '; } } ?>
            wyświetlenia: <?php global $post; echo get_post_meta($post->ID, 'post_views_count', true); ?>
            <?php if( shortcode_exists('rt_reading_time') ) : ?><br>czas czytania:
            <?php echo do_shortcode('[rt_reading_time]') ?>min<?php endif; ?></p>
         </div>
         <div class="col-md-5">
            <?php the_post_thumbnail('post-thumbnail', 
            array('class' => 'img-fluid w-100 h-100')); ?>
         </div>
      </div>
      <hr>
      <?php else : ?>
      <h2 class="my-3"><?php the_title(); ?></h2>
      <p><?php echo get_the_excerpt(); ?></p>
      <p><?php if ( $redux['s9b1v2'] == 1 ) { echo get_the_author().' | '; } ?>
      <?php if ( $redux['s9b1v3'] == 1 ) { echo get_the_date().' | '; } ?>
      <?php if ( $redux['s9b1v4'] == 1 ) { foreach(get_the_category() as $category) 
      { echo $category->cat_name.' | '; } } ?>
      wyświetlenia: <?php global $post; echo get_post_meta($post->ID, 'post_views_count', true); ?>
      <?php if( shortcode_exists('rt_reading_time') ) : ?><br>czas czytania:
      <?php echo do_shortcode('[rt_reading_time]') ?>min<?php endif; ?></p>
      <hr>
      <?php endif; ?>

      <?php else : ?>

      <?php if( has_post_thumbnail() ) : ?>
      <h2 class="my-3"><?php the_title(); ?></h2>
      <p><?php if ( $redux['s9b1v2'] == 1 ) { echo get_the_author().' | '; } ?>
      <?php if ( $redux['s9b1v3'] == 1 ) { echo get_the_date().' | '; } ?>
      <?php if ( $redux['s9b1v4'] == 1 ) { foreach(get_the_category() as $category) 
      { echo $category->cat_name.' | '; } } ?>
      wyświetlenia: <?php global $post; echo get_post_meta($post->ID, 'post_views_count', true); ?>
      <?php if( shortcode_exists('rt_reading_time') ) : ?><br>czas czytania:
      <?php echo do_shortcode('[rt_reading_time]') ?>min<?php endif; ?></p>
      <div class="row pb-3">
         <div class="col-md-7 mx-auto">
            <?php the_post_thumbnail('post-thumbnail', 
            array('class' => 'img-fluid w-100 h-100')); ?>
         </div>
      </div>
      <?php else : ?>
      <h2 class="my-3"><?php the_title(); ?></h2>
      <p><?php if ( $redux['s9b1v2'] == 1 ) { echo get_the_author().' | '; } ?>
      <?php if ( $redux['s9b1v3'] == 1 ) { echo get_the_date().' | '; } ?>
      <?php if ( $redux['s9b1v4'] == 1 ) { foreach(get_the_category() as $category) 
      { echo $category->cat_name.' | '; } } ?>
      wyświetlenia: <?php global $post; echo get_post_meta($post->ID, 'post_views_count', true); ?>
      <?php if( shortcode_exists('rt_reading_time') ) : ?><br>czas czytania:
      <?php echo do_shortcode('[rt_reading_time]') ?>min<?php endif; ?></p>
      <?php endif; ?>

      <?php endif; ?>

      <?php endif; ?>
      
      <div class="content text">
         <?php the_content(); ?>
      </div>
      
      <?php if( !is_elementor() ) : ?>

      <p><?php previous_post_link( 'Poprzedni wpis: %link<br/>' ); ?>
      <?php next_post_link( 'Następny wpis: %link<br/>' ); ?></p>

      <?php if ( comments_open() ) { comments_template(); } ?>

      <div id="fb-root"></div>
      <script async defer crossorigin="anonymous" 
      src="https://connect.facebook.net/pl_PL/sdk.js#xfbml=1&version=v3.2"></script>

      <?php if( $redux['fbc'] == 1 ) : ?>
      <div class="fb-like my-2" data-href="<?php echo get_permalink(); ?>" data-width="100px" 
      data-layout="button_count" data-action="like" data-size="large" data-show-faces="false" 
      data-share="true"></div>
      <?php endif; ?>

      <?php if( $redux['fbb'] == 1 ) : ?>
      <div class="fb-comments my-2" data-href="<?php echo get_permalink(); ?>" 
      data-width="100%" data-numposts="5"></div>
      <?php endif; ?>

      <?php endif; ?>
      
      <?php endwhile; ?>

   <?php if( !is_elementor() ) : ?>
   </div>
   
</section>
<?php endif; ?>

<?php global $redux ?>

<?php
/**
* Template for displaying course content within the loop.
* This template can be overridden by copying it to yourtheme/learnpress/content-course.php
* @author  ThimPress
* @package LearnPress/Templates
* @version 4.0.0
* Prevent loading this file directly
*/
defined( 'ABSPATH' ) || exit();
?>

<?php if( $redux['crs'] == 2 ) : ?>
<li id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-6' ); ?>>
<?php endif; ?>

<?php if( $redux['crs'] == 3 ) : ?>
<li id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-4' ); ?>>
<?php endif; ?>

<?php if( $redux['crs'] == 4 ) : ?>
<li id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-3' ); ?>>
<?php endif; ?>

<?php if( $redux['crs'] == 6 ) : ?>
<li id="post-<?php the_ID(); ?>" <?php post_class( 'col-md-2' ); ?>>
<?php endif; ?>

<?php
do_action( 'learn-press/before-courses-loop-item' );
?>

<a href="<?php the_permalink(); ?>" class="course-permalink">

<?php
do_action( 'learn-press/courses-loop-item-title' );
?>

</a>

<?php
do_action( 'learn-press/after-courses-loop-item' );
?>

</li>

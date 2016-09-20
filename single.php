<?php
/**
 * The template for displaying single posts.
 *
 * @package WordPress
 * @subpackage WordPress Start Me Up
 */

get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php the_title(); ?>

	<?php the_content(); ?>

<?php endwhile;  ?>


<?php get_footer(); ?>

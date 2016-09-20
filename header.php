<?php
/**
 * The template for displaying the header
 *
 * @package WordPress
 * @subpackage WordPress Start Me Up
 *
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>

	<?php
	  $hostname = $_SERVER['HTTP_HOST']; // For local development
	  if ($hostname == 'start-me-up:8888'  ): //Set hostname as provided
	?>
	<!-- bower:css -->
	<!-- endbower -->

	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/dev.css" />
	<?php else:?>

	<!-- vendor:css -->
	<!-- endvendor -->
	<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/main.min.css" />
	<?php endif;?>

</head>

<body <?php body_class(); ?>>

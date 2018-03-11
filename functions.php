<?php

function wpsmu_setup(){
  require_once('lib/admin.php');
  require_once('lib/login.php');
  require_once('lib/acf.php');
  require_once('lib/tgmpa.php');
}

add_action( 'after_setup_theme', 'wpsmu_setup' );

$localhostURL = 'wp-start.test';
// Load styles
function main_styles() {
		$hostname = $_SERVER['HTTP_HOST']; // For local development
		if ($hostname == $localhostURL  ){ //Set hostname as provided
	    //gem css
	  	wp_register_style('main-styles', get_stylesheet_directory_uri()  . '/dist/dev.css', array(), '1.0', 'all');
	  	wp_enqueue_style('main-styles');
		}else{
			wp_register_style('main-styles', get_stylesheet_directory_uri()  . '/dist/main.min.css', array(), '1.0', 'all');
	  	wp_enqueue_style('main-styles');
		}

}
add_action('wp_enqueue_scripts', 'main_styles'); // Add Theme Stylesheet

//Load scripts
function main_footer_scripts() {
	wp_register_script('main-js', get_stylesheet_directory_uri()  . '/dist/main.min.js', false);
  wp_enqueue_script('main-js');
}
add_action('init', 'main_footer_scripts'); // Add Custom Scripts to wp_footer


?>

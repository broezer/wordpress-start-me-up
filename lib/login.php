<?php
/* 
** Login Screen Functions
**
*/
function my_login_stylesheet() {
    wp_enqueue_style( 'custom-login', get_stylesheet_directory_uri() . '/lib/login/style-login.css' );
}

add_action( 'login_enqueue_scripts', 'my_login_stylesheet' );
?>
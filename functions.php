<?php

function wpsmu_setup(){
  require_once('lib/admin.php');
  require_once('lib/login.php');
  require_once('lib/acf.php');
  require_once('lib/tgmpa.php');
}

add_action( 'after_setup_theme', 'wpsmu_setup' );

?>

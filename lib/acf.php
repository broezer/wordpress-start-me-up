<?php
//Add ACF JSON Save - Sync Support
add_filter('acf/settings/save_json', 'my_acf_json_save_point');

function my_acf_json_save_point( $path ) {

    // update path
    $path = get_stylesheet_directory() . '/lib/acf';


    // return
    return $path;

}


//Add ACF JSON Load - Sync Support
add_filter('acf/settings/load_json', 'my_acf_json_load_point');

function my_acf_json_load_point( $paths ) {

    // remove original path (optional)
    unset($paths[0]);


    // append path
    $paths[] = get_stylesheet_directory() . '/lib/acf';


    // return
    return $paths;

}

?>

<?php
// @codingStandardsIgnoreFile

// source: https://wordpress.org/support/topic/wp-44-remove-json-api-and-x-pingback-from-http-headers
// remove json-api and x-pingback (frontend)
remove_action( 'wp_head', 'rest_output_link_wp_head', 10 );
remove_action( 'wp_head', 'wp_oembed_add_discovery_links', 10 );
remove_action( 'wp_head', 'wp_generator', 10 );
remove_action( 'template_redirect', 'rest_output_link_header', 11 );
remove_action( 'wp_head', 'rsd_link', 10 );
remove_action( 'wp_head', 'wlwmanifest_link', 10 );
remove_action( 'wp_head', 'wp_shortlink_wp_head', 10 );


// Remove X-Pingback in the HTTP header
add_filter( 'wp_headers', function ( $headers ) {
    unset( $headers['X-Pingback'] );

    return $headers;
} );

// Remove Update Page in Menu
function removeUpdateMenu() {
    remove_submenu_page( 'index.php', 'update-core.php' );
}

add_action( 'admin_init', 'removeUpdateMenu' );

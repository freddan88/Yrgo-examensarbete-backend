<?php

declare(strict_types=1);

show_admin_bar(false);

// Register plugin helpers and custom functions
require 'metaboxes/photo_metabox.php';
require 'metaboxes/blogg_metabox.php';
require 'includes/api-photo-qty-year.php';
require 'includes/api-blogg-qty-year.php';
require 'includes/api-photo-qty-month.php';
require 'includes/api-blogg-qty-month.php';
require 'includes/api-photo.php';
require 'includes/api-blogg.php';
require 'post-types/photo.php';
require 'post-types/blogg.php';
require 'includes/plate.php';

// Enqueue and register scripts the right way.
add_action('wp_enqueue_scripts', function () {
    wp_deregister_script('jquery');
    // wp_enqueue_style('style-css', get_template_directory_uri().'/assets/styles/app.css','','1 .0' ,'all' );
    // wp_enqueue_style('font-awesome-css', get_template_directory_uri().'/assets/styles/font-awesome/all.min.css','','5.8.1' ,'all' );
    // wp_enqueue_script( 'javascript', get_template_directory_uri().'/assets/scripts/app.js','', '1.0', true);
});

add_action('rest_api_init', function () {

    register_rest_route('rhg/v1', 'photo',
        [
        'methods' => 'GET',
        'callback' => 'rhg_gallery_data',
        ]
    );

    register_rest_route('rhg/v1', 'photo/month',
        [
        'methods' => 'GET',
        'callback' => 'rhg_gallery_qty_month',
        ]
    );

    register_rest_route('rhg/v1', 'photo/year',
        [
        'methods' => 'GET',
        'callback' => 'rhg_gallery_qty_year',
        ]
    );

    register_rest_route('rhg/v1', 'blogg/month',
        [
        'methods' => 'GET',
        'callback' => 'rhg_blogg_qty_month',
        ]
    );

    register_rest_route('rhg/v1', 'blogg/year',
        [
        'methods' => 'GET',
        'callback' => 'rhg_blogg_qty_year',
        ]
    );

    register_rest_route('rhg/v1', 'blogg',
        [
        'methods' => 'GET',
        'callback' => 'rhg_blogg_data',
        ]
    );
});

function delete_fullsize_image($metadata)
{
    $upload_dir = wp_upload_dir();
    $full_image_path = trailingslashit( $upload_dir['basedir'] ) . $metadata['file'];  
    $image = file_get_contents($full_image_path);
    $image = imagecreatefromstring($image);
    $imageResized = imagescale($image, 1280, -1);
    unlink($full_image_path);
    imagejpeg($imageResized,$full_image_path);
    
    $image_sizes = getimagesize($full_image_path);
    $metadata['width'] = $image_sizes[0];
    $metadata['height'] = $image_sizes[1];
    return $metadata;
}

add_filter( 'wp_generate_attachment_metadata', 'delete_fullsize_image' );

add_filter( 'rest_endpoints', function( $endpoints ){
    if ( isset( $endpoints['/wp/v2'] ) ) {
        unset( $endpoints['/wp/v2'] );
    }
    if ( isset( $endpoints['/cmb2/v1'] ) ) {
        unset( $endpoints['/cmb2/v1'] );
    }
    if ( isset( $endpoints['/oembed/1.0'] ) ) {
        unset( $endpoints['/oembed/1.0'] );
    }
    return $endpoints;
});

// Remove JPEG compression.
add_filter('jpeg_quality', function () {
    return 100;
}, 10, 2);

add_theme_support('html5',
    [
    'caption',
    'comment-form',
    'comment-list',
    'gallery',
    'search-form',
    'widgets',
    ]
);
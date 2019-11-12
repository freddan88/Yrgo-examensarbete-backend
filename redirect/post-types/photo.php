<?php

declare (strict_types = 1);

add_action('init', function () {
    register_post_type('photo', [
        'has_archive' => true,
        'show_in_rest' => true,
        'labels' => [
            'add_new_item' => __('Ny'),
            'edit_item' => __('Redigera'),
            'name' => __('Foton'),
            'search_items' => __('Sök'),
            'singular_name' => __('Foto'),
        ],
        'supports' => [
            'title',
        ],
        'public' => false,  // it's not public, it shouldn't have it's own permalink, and so on
        'publicly_queryable' => true,  // you should be able to query it
        'show_ui' => true,  // you should be able to edit it in wp-admin
        'exclude_from_search' => true,  // you should exclude it from search results
        'show_in_nav_menus' => false,  // you shouldn't be able to add it to menus
        'has_archive' => false,  // it shouldn't have archive page
        'rewrite' => false,  // it shouldn't have rewrite rules
        'menu_icon' => 'dashicons-camera',
        'show_in_menu' => true,
        'menu_position' => 4,
    ]);
});
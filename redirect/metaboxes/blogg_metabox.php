<?php

declare (strict_types = 1);

function blogg_metabox()
{
    $cmb = new_cmb2_box(
        [
        'id'            => 'blogg',
        'title'         => __('Blogg', 'cmb2'),
        'object_types'  => ['blogg'], // Post type
        'context'       => 'normal',
        'priority'      => 'high',
        'show_names'    => true, // Show field names on the left
        'cmb_styles'    => true, // false to disable the CMB stylesheet
        'closed'        => false, // True to keep the metabox closed by default
        'show_in_rest'  => WP_REST_Server::READABLE, // or WP_REST_Server::ALLMETHODS/WP_REST_Server::EDITABLE,
        ]
    );

    $cmb->add_field(
        [
        'name'    => '',
        'desc'    => '',
        'id'      => 'content',
        'type'    => 'wysiwyg',
        'options' => [
            'wpautop' => false, // use wpautop?
            'media_buttons' => false, // show insert/upload button(s)
            'teeny' => true, // output the minimal editor config used in Press This
            'tinymce' => true, // load TinyMCE, can be used to pass settings directly to TinyMCE using an array()
            'quicktags' => true // load Quicktags, can be used to pass settings directly to Quicktags using an array()
            ],
        ]
    );
}

add_action('cmb2_init', 'blogg_metabox');
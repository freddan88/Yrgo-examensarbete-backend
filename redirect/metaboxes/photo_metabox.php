<?php

declare (strict_types = 1);

function Photo_metabox()
{
    $cmb = new_cmb2_box(
        [
        'id'            => 'photo',
        'title'         => __('Galleri', 'cmb2'),
        'object_types'  => ['photo'], // Post type
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
        'name' => '',
        'desc' => '',
        'id'   => 'photo_list',
        'type' => 'file_list',
        'preview_size' => [80, 80], // Default: array( 50, 50 )
        'query_args' => ['type' => 'image'], // Only images attachment
            'text' => [
                'add_upload_files_text' => 'Välj filer', // default: "Add or Upload Files"
                'remove_image_text' => 'Ta bort', // default: "Remove Image"
                'file_text' => 'Fil', // default: "File:"
                'file_download_text' => 'Ladda ner', // default: "Download"
                'remove_text' => 'Ta bort', // default: "Remove"
            ],
        ]
    );
}

add_action('cmb2_init', 'Photo_metabox');
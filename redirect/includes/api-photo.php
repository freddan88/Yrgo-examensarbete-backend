<?php

declare(strict_types=1);

function rhg_gallery_data( WP_REST_Request $request )
{

    $slug = $request->get_param('slug');
    $year = $request->get_param('year');
    $pagination_number = $request->get_param('page');
    $posts_per_page = $request->get_param('per_page');
    $offset = ($pagination_number - 1) * $posts_per_page;

    $args = [
        'posts_per_page' => $posts_per_page,
        'post_type' => 'photo',
        'offset' => $offset,
        'name' => $slug,
        'year' => $year,
    ];

    $stats = [
        'posts_per_page' => -1,
        'post_type' => 'photo',
        'year' => $year,
    ];

    $posts = get_posts($stats);
    $count_posts = count($posts);

    if (!empty($posts_per_page) && $posts_per_page > 0) {
        $total_pages = round($count_posts/$posts_per_page);
    } else {
        $total_pages = null;
    }

    $galleries = get_posts($args);
    $data = [];
    $i = 0;

    while ($i <= count($galleries)) {
        if ($galleries[$i]->ID == null) {
            break;
        }

        $image_ids = get_post_meta($galleries[$i]->ID, 'photo_list', 1);
        $dateTime = explode(" ", $galleries[$i]->post_date);

        $data[$i]['id'] = $galleries[$i]->ID;
        $data[$i]['date'] = $dateTime[0];
        $data[$i]['time'] = $dateTime[1];
        $data[$i]['posts'] = $count_posts;
        $data[$i]['pages'] = $total_pages;
        $data[$i]['title'] = $galleries[$i]->post_title;
        $data[$i]['slug'] = $galleries[$i]->post_name;
        $data[$i]['type'] = $galleries[$i]->post_type;
        // $data[$i]['media'] = [];
        $data[$i]['photos']['small'] = [];
        $data[$i]['photos']['big'] = [];

        if (is_array($image_ids)) {
            foreach ((array) $image_ids as $image_id => $image_url) {
                // $data[$i]['media'][] = [
                //     'id' => $image_id,
                //     'title' => get_the_title($image_id),
                //     'caption' => wp_get_attachment_caption($image_id),
                //     'large' => wp_get_attachment_image_src($image_id, 'large')[0],
                //     'medium' => wp_get_attachment_image_src($image_id, 'medium')[0],
                //     'thumbnail' => wp_get_attachment_image_src($image_id, 'thumbnail')[0],
                //     'medium_large' => wp_get_attachment_image_src($image_id, 'medium_large')[0],
                //     'alt_text' => get_post_meta($image_id, '_wp_attachment_image_alt', true),
                //     'source_set' => wp_get_attachment_image($image_id, 'large'),
                // ];
                $title = get_the_title($image_id);
                $alt_text = get_post_meta($image_id, '_wp_attachment_image_alt', true);

                $data[$i]['photos']['small'][] = [
                    'id' => $image_id,
                    'title' => $title,
                    'alt_text' => $alt_text,
                    'thumbnail' => wp_get_attachment_image_src($image_id, 'thumbnail')[0],
                ];

                $data[$i]['photos']['big'][] = [
                    'id' => $image_id,
                    'title' => $title,
                    'alt_text' => $alt_text,
                    'caption' => wp_get_attachment_caption($image_id),
                    'large' => wp_get_attachment_image_src($image_id, 'large')[0],
                    'medium' => wp_get_attachment_image_src($image_id, 'medium')[0],
                    'medium_large' => wp_get_attachment_image_src($image_id, 'medium_large')[0],
                ];
            }
        }

        $i++;
    }

    return $data;
}
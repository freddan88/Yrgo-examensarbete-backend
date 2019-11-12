<?php

declare(strict_types=1);

function rhg_blogg_data( WP_REST_Request $request )
{

    $slug = $request->get_param('slug');
    $year = $request->get_param('year');
    $pagination_number = $request->get_param('page');
    $posts_per_page = $request->get_param('per_page');
    $offset = ($pagination_number - 1) * $posts_per_page;

    $args = [
        'posts_per_page' => $posts_per_page,
        'post_type' => 'blogg',
        'offset' => $offset,
        'name' => $slug,
        'year' => $year,
    ];

    $stats = [
        'posts_per_page' => -1,
        'post_type' => 'blogg',
        'year' => $year,
    ];

    $posts = get_posts($stats);
    $count_posts = count($posts);

    if (!empty($posts_per_page) && $posts_per_page > 0) {
        $total_pages = round($count_posts/$posts_per_page);
    } else {
        $total_pages = null;
    }

    $bloggs = get_posts($args);
    $data = [];
    $i = 0;

    while ($i <= count($bloggs)) {

        if ($bloggs[$i]->ID == null) {
            break;
        }

        $dateTime = explode(" ", $bloggs[$i]->post_date);
        
        $data[$i]['id'] = $bloggs[$i]->ID;
        $data[$i]['date'] = $dateTime[0];
        $data[$i]['time'] = $dateTime[1];
        $data[$i]['posts'] = $count_posts;
        $data[$i]['pages'] = $total_pages;
        $data[$i]['type'] = $bloggs[$i]->post_type;
        $data[$i]['slug'] = $bloggs[$i]->post_name;
        $data[$i]['title'] = $bloggs[$i]->post_title;
        $data[$i]['content'] = $bloggs[$i]->post_content;

        $i++;

    };

    return $data;
}
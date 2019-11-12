<?php

declare(strict_types=1);

function rhg_gallery_qty_year()
{
    $args = [
        'posts_per_page' => -1,
        'post_type' => 'photo',
    ];

    $galleries = get_posts($args);
    $data = [];
    $i = 0;

    while ($i <= count($galleries)) {
        if ($galleries[$i]->ID == null) {
            break;
        }

        $dateArray = explode("-", $galleries[$i]->post_date);
        $year = $dateArray[0];
        $data[$i] = $year;

        $vals = array_count_values($data);

        $i++;
    }

    $data = [];
    foreach ($vals as $key => $value) {
        $obj = [
            'year' => $key,
            'published' => $value,
        ];
        array_push($data, $obj);
    }

    return($data);
}
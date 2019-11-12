<?php

declare(strict_types=1);

function rhg_blogg_qty_year()
{
    $args = [
        'posts_per_page' => -1,
        'post_type' => 'blogg',
    ];

    $bloggs = get_posts($args);
    $data = [];
    $i = 0;

    while ($i <= count($bloggs)) {
        if ($bloggs[$i]->ID == null) {
            break;
        }

        $dateArray = explode("-", $bloggs[$i]->post_date);
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
<?php

declare(strict_types=1);

function rhg_gallery_qty_month(WP_REST_Request $request)
{
    $year = $request->get_param('year');

    $args = [
        'posts_per_page' => -1,
        'post_type' => 'photo',
        'year' => $year,
    ];

    $galleries = get_posts($args);
    $data = [];
    $i = 0;

    while ($i <= count($galleries)) {
        if ($galleries[$i]->ID == null) {
            break;
        }

        $dateArray = explode("-", $galleries[$i]->post_date);
        $yearMonth = "$dateArray[0]-$dateArray[1]";
        $data[$i] = $yearMonth;

        $vals = array_count_values($data);

        $i++;
    }

    $data = [];
    foreach ($vals as $key => $value) {
        $yearMonth = explode("-", $key);
        $date=date_create($key);
        $obj = [
            'year' => $yearMonth[0],
            'month' => $yearMonth[1],
            // 'yearMonth' => $key,
            // 'shortMonth' => date_format($date,"M"),
            'published' => $value,
        ];
        array_push($data, $obj);
    }

    return($data);
}
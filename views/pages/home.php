<?php


$data = dbSelect(
    Tables::Content,
    conditions: 'name IN ("banner", "video", "catalog", "gallery", "reviews")'
);
$data = convertContentToAssoc($data);

require PARTS_DIR . '/header.php';

//echo '<pre>'.print_r($data['gallery'], true).'</pre>';
//die();

if (!empty($data['banner'])) {
    $banner = $data['banner'];
    require PARTS_DIR . '/banner.php';
}


if (!empty($data['video'])) {
    $aboutUs = $data['video'];
    require PARTS_DIR . '/about-us.php';
}

if (!empty($data['catalog'])) {
    $catalog = $data['catalog'];
    require PARTS_DIR . '/catalog.php';
}

if (!empty($data['gallery'])) {
    $gallery = $data['gallery'];
    require PARTS_DIR . '/gallery.php';
}

if (!empty($data['reviews'])) {
    $reviews = $data['reviews'];
    require PARTS_DIR . '/reviews.php';
}

require PARTS_DIR . '/footer.php';


<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';

const ROOT_DIR = __DIR__;

if(!session_id()) {
    session_start();
}

require_once ROOT_DIR . '/config/constants.php';
require_once ROOT_DIR . '/config/DB.php';

require_once APP_DIR . '/index.php';



$mainFields = dbSelect(Tables::Content, conditions: 'name IN ("navigation", "footer")');
$mainFields = convertContentToAssoc($mainFields);

if (!empty($_POST)) {
    require_once APP_DIR . '/forms/controller.php';
} else {

    require_once ROOT_DIR . '/config/router.php';
}







//require PARTS_DIR . '/header.php';
//
//require_once PAGES_DIR .'/home.php';
//
//require PARTS_DIR . '/footer.php';







//$data = [
//    'logo' => '/progect doner/nev/logo.svg',
//    'links' => [
//        [
//        'text' => 'Home',
//        'is_anchor' => false,
//        'href' => ''
//
//],
//    [
//        'text' => 'About',
//        'is_anchor' => true,
//        'href' => '#about-us'
//    ],
//    [
//        'text' => 'Menu',
//        'is_anchor' => true,
//        'href' => '#catalog'
//    ],
//    [
//        'text' => 'Gallery',
//        'is_anchor' => true,
//        'href' => '#gallery'
//    ],
//    [
//        'text' => 'Reviews',
//        'is_anchor' => true,
//        'href' => '#reviews'
//    ]
//]
//];
//

//
//require_once PAGES_DIR .'/home.php';

//
//$data = [
//    'about_us' => [
//        'title' => 'Contact',
//        'description' => 'Glasgow 85 W Nile St, Glasgow G1 2St glasgow@donerhaus.uk  +12302041350',
//    ],
//    'copyright' => 'Copyright Haus Holdings Ltd 2021. All rights reserved.',
//    'newsletter' => [
//        'title' => 'Newsletter',
//        'description' => 'Stay apdate with our latest'
//    ],
//    'socials' => [
//        'title' => 'Follow Us',
//        'description' => 'Let us be social',
//        'list' => [
//            [
//                'link' => 'https://facebook.com',
//                'icon' => 'fa-brands fa-facebook-f'
//            ],
//            [
//                'link' => 'https://twitter.com',
//                'icon' => 'fa-brands fa-twitter'
//            ],
//            [
//                'link' => 'https://youtube.com',
//                'icon' => 'fa-brands fa-youtube'
//            ]
//        ]
//    ]
//];
//
//echo json_encode($data);
//
//$data = [
//    'title' => 'What kind of Doner we serve for you?',
//    'description' => 'Who are in extremely love with eco friendly system.',
//    'reviews' => [
//        [
//        'logo' => 'progect%20doner/nev/r1.png',
//        'name' => 'Company Name',
//        'review' => '3',
//        'text' => 'Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.',
//    ],
//    [
//        'logo' => 'progect%20doner/nev/r2.png',
//        'name' => 'Another Company',
//        'review' => '5',
//        'text' => 'Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer.'
//    ],
//     [
//         'numberFirst' => '329',
//         'clients' => 'Happy clients',
//         'numberSecond' => '983',
//         'projects' => 'Total Projects',
//         'numberAll' => '261',
//         'all' => 'All Rolls',
//         'numberTotal' => '1369',
//         'total' => 'Total Submitted'
//     ]
//]
//];
//
//echo json_encode($data);

//
//$data = [
//    'title' => 'What kind of meat do you want?',
//    'description' => 'Who are in extremely love with eco friendly system.',
//    'gallery' => [
//        'left' => [
//            'progect%20doner/nev/266_s.jpg',
//            'progect%20doner/nev/276_s.jpg'
//        ],
//        'right' => [
//            'top' => [
//                'progect%20doner/nev/269_s.jpg'
//            ],
//            'bottom' => [
//                'progect%20doner/nev/270_s.jpg',
//                'progect%20doner/nev/271_s.jpg'
//            ]
//        ]
//    ]
//



//$data = [
//    'title' => 'What kind do you want?',
//    'description' => 'Who are in extremely love with eco friendly system.'
//
//];

//$data = [
//    'video' =>[
//        'image' => 'progect doner/nev/123456.jpg',
//        'url' => '#'
//    ],
//    'description' => [
//        'pre_title' => 'The best ingredients',
//        'title' => 'High quality and delisious',
//        'quote' => 'quick and tasty',
//        'text' => 'check it yourself',
//        'sign' => 'progect%20doner/nev/123456.jpg'
//    ]
//
//];

//$data =[
//    [
//        'description' => 'ARE YOU HUNGRY?',
//        'links' => 'Our DONER is the best and useful',
//        'button' => [
//            'text' => 'Buy Now',
//            'is_anchor' => true,
//            'href' => '#catalog'
//        ]
//    ],
//    [
//        'description' => 'ONLY TODAY',
//        'links' => 'Sale 20%',
//        'button' => [
//            'text' => 'Login',
//            'is_anchor' => true,
//            'href' => 'login'
//        ]
//    ],
//    [
//        'description' => 'EVERY DAY',
//        'links' => 'Fast, Satisfying, Useful',
//        'button' => [
//            'text' => 'Buy Now',
//            'is_anchor' => true,
//            'href' => '#catalog'
//        ]
//    ]
//
//];
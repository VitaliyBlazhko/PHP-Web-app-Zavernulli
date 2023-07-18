

<html lang="en" xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html"
      xmlns="http://www.w3.org/1999/html" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/lib/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
          crossorigin="anonymous"/>
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/css/main.css"/>
</head>
<body>
<?php require_once PARTS_DIR . '/notifications.php'?>
<header id="navigation">
    <div class="container">
        <div class="row d-flex align-items-center justify-content-between">
            <?php if (!empty($mainFields['navigation']['logo'])): ?>
            <div class="col" id="logo">
                <a href="/">
                    <img src="<?= IMAGES_URI . $mainFields['navigation']['logo'] ?>" style="max-width: 130px" alt="Logo"/>
                </a>
            </div>
            <?php endif; ?>

            <div class="col d-flex justify-content-end">
                    <nav class="nav">
                        <?php if (!empty($mainFields['navigation']['links'])): ?>
                            <?php foreach ($mainFields['navigation']['links'] as $link):
                                $href = DOMAIN . '/' . $link['href'];
                                ?>
                                <a class="nav-link" href="<?= $href ?>"><?= $link['text'] ?></a>
                            <?php endforeach; ?>
                            <a class="nav-link" href="/cart">Cart</a>
                            <?php if (!isLoggedIn()): ?>
                                <a class="nav-link" href="/login">Login</a>
                                <a class="nav-link" href="/registration">Sign Up</a>
                            <?php else: ?>
                                <?php if (isAdmin()): ?>
                                    <a class="nav-link" href="/admin/dashboard"><i class="fa-solid fa-screwdriver-wrench"></i></a>
                                <?php endif; ?>
                                <a class="nav-link" href="/logout">Logout</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </nav>
            </div>
        </div>
    </div>
</header>

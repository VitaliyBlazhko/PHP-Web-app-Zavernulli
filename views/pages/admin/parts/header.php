<!doctype html>
<html lang="en">
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
    <link rel="stylesheet" href="<?= ASSETS_URI ?>/css/admin.css"/>
</head>
<body>
<?php require_once PARTS_DIR . '/notifications.php'?>
<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark admin-sidebar" style="width: 280px;">
    <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
        <span class="fs-4">Admin Panel</span>
    </a>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/admin/products" class="nav-link <?= isCurrentPage('admin/products') ? 'active' : '' ?>" aria-current="page">
                <i class="fa-solid fa-list"></i> All Products
            </a>
        </li>
        <li class="nav-item">
            <a href="/admin/products/create" class="nav-link <?= isCurrentPage('admin/products/create') ? 'active' : '' ?>" aria-current="page">
                <i class="fa-solid fa-square-plus"></i> Create Product
            </a>
        </li>
        <li class="nav-item">
            <a href="/admin/content" class="nav-link <?= isCurrentPage('admin/content') ? 'active' : '' ?>" aria-current="page">
                <i class="fa-regular fa-pen-to-square"></i> Content Management
            </a>
        </li>
    </ul>
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">
        <li><a class="nav-link text-white" href="/">Go to the site</a></li>
        <li><a class="nav-link text-white" href="/logout">Logout</a></li>
    </ul>
</div>
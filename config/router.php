<?php

switch (getUrl()) {
    case '':
        require PAGES_DIR . '/home.php';
        break;
    case 'cart':
        require PAGES_DIR . '/cart.php';
        break;
    case 'registration':
        conditionRedirect(isLoggedIn());
        require PAGES_DIR . '/auth/registration.php';
        break;
    case 'login':
        conditionRedirect(isLoggedIn());
        require PAGES_DIR . '/auth/login.php';
        break;
    case 'logout':
        removeUser();
        redirect();
        break;
    case 'admin/dashboard':
        conditionRedirect(!isAdmin());
        require PAGES_DIR . '/admin/dashboard.php';
        break;
    case 'admin/products/create':
        conditionRedirect(!isAdmin());
        require PAGES_DIR . '/admin/products/create.php';
        break;
    case 'admin/products':
        conditionRedirect(!isAdmin());
        require PAGES_DIR . '/admin/products/index.php';
        break;
    case (bool) preg_match('/admin\/products\/edit\/\d+/', getUrl()):
        conditionRedirect(!isAdmin());

        $product = getEditProduct(getUrl());

        if (!$product) {
            notify('Product does not exists', 'danger');
            redirect('/admin/products');
        }

        require PAGES_DIR . '/admin/products/edit.php';
        break;
    case 'admin/content':
        conditionRedirect(!isAdmin());
        require PAGES_DIR . '/admin/content/index.php';
        break;
    case (bool) preg_match('/admin\/content\/edit\/(\d+)/', getUrl(), $match):
        conditionRedirect(!isAdmin());
        $id = end($match);
        $block = dbFind(Tables::Content, $id);
        conditionRedirect(!$block);
        $file = ADMIN_PAGES_DIR . "/content/blocks/{$block['name']}.php";

        if (!file_exists($file)) {
            notify("View [{$block['name']}] for editing this block does not exists", 'warning');
            redirect('/admin/content');
        }

        require $file;
        break;
    default:
        dd(getUrl());
}

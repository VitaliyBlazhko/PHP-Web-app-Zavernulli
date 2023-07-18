<?php

function addToCart(array $fields)
{
    $_SESSION['cart'][] = $fields;

    notify('Product was added to the cart');

    redirect();
}

function removeCartItem(array $product)
{
    if (isset($product['parent_key'])) {
        $parentKey = $product['parent_key'];
        $productKey = $product['product_key'];
        unset($_SESSION['cart'][$parentKey]['additions'][$productKey]);
        unset($_SESSION['cart'][$parentKey]['additions_qty'][$productKey]);
        if (!empty($_SESSION['cart'][$parentKey]['additions'])) {
            $_SESSION['cart'][$parentKey]['additions'] = array_values($_SESSION['cart'][$parentKey]['additions']);
            $_SESSION['cart'][$parentKey]['additions_qty'] = array_values($_SESSION['cart'][$product['parent_key']]['additions_qty']);
        }
    } else {
        unset($_SESSION['cart'][$product['product_key']]);
        if (!empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array_values($_SESSION['cart']);
        }
    }

    redirect('/cart');
}

function getCartItems(): array
{
    $cartItems = [];

    if (!empty($_SESSION['cart'])) {
        $productsIds = array_merge(mapProductsIds($_SESSION['cart']), mapAdditionsIds($_SESSION['cart']));
        $products = dbSelect(Tables::Products, conditions: 'id IN ('. implode(', ', $productsIds) .')');
        $cartItems = prepareProductsToCart($_SESSION['cart'], $products);
        $cartItems['total'] = calcTotal($cartItems);
    }

    return $cartItems;
}

function calcTotal(array $items): float
{
    $total = 0;

    foreach ($items as $item) {
        if (!empty($item['additions']) && is_array($item['additions'])) {
            $item['total'] += calcTotal($item['additions']);
        }
        $total += $item['total'];
    }

    return $total;
}

function mapProductsIds(array $cartProducts): array
{
    $productsIds = array_map(fn($item) => $item['product_id'], $cartProducts);
    return array_unique($productsIds);
}

function mapAdditionsIds(array $cartProducts): array
{
    $productsIds = [];
    $ids = array_map(fn($item) => $item['additions'], $cartProducts);
    $ids = array_filter($ids, fn($item) => is_array($item));

    foreach($ids as $idArray) {
        $productsIds = array_merge($productsIds, $idArray);
    }

    return array_unique($productsIds);
}

function prepareProductsToCart(array $cart, array $dbProducts): array
{
    return array_map(function($item) use ($dbProducts) {
        $product = getProductFromDbArray($dbProducts, $item['product_id']);
        $item = array_merge($item, [
            'name' => $product['name'],
            'price' => $product['price'],
            'total' => $product['price'] * $item['quantity'],
        ]);

        if (!empty($item['additions'])) {
            $item['additions'] = buildProductAdditions(
                $item['additions'],
                $item['additions_qty'],
                $dbProducts,
                $item['product_id']
            );
        } else {
            unset($item['additions']);
        }
        unset($item['additions_qty']);

        return $item;
    }, $cart);
}

function buildProductAdditions(array $additions, array $additionsQty, array $dbProducts, $productId)
{
    return array_map(function($id, $quantity) use ($dbProducts, $productId) {
        $product = getProductFromDbArray($dbProducts, $id);
        return [
            'product_id' => $id,
            'parent_id' => $productId,
            'name' => $product['name'],
            'price' => $product['price'],
            'quantity' => $quantity,
            'total' => $product['price'] * $quantity,
        ];
    }, $additions, $additionsQty);
}

function getProductFromDbArray(array $dbProducts, int $productId): array|null
{
    $result = array_filter($dbProducts, fn($dbProduct) => $dbProduct['id'] === $productId);

    return array_shift($result);
}

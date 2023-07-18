<?php

function createOrder()
{
    $cart = getCartItems();
    $total = $cart['total'];
    unset($cart['total']);

    try {
        DB::connect()->beginTransaction();

        $orderId = insertOrder($_SESSION['user']['id'], $total);
        setProductsToOrder($orderId, $cart);

        DB::connect()->commit();

        notify('Success');
        redirect();
    } catch (PDOException $e) {
        DB::connect()->rollBack();
        notify($e->getMessage(), 'danger');
        redirect('/cart');
    }
}

function setProductsToOrder(int $orderId, array $cart)
{
    $query = "INSERT INTO " . Tables::OrderProducts->value . " (order_id, product_id, quantity, single_price, additions) VALUES (:order_id, :product_id, :quantity, :single_price, :additions)";
    $query = DB::connect()->prepare($query);

    foreach ($cart as $item) {
        $additions = [];
        $data = [
            'order_id' => $orderId,
            'product_id' => $item['product_id'],
            'quantity' => $item['quantity'],
            'single_price' => $item['price']
        ];

        minusProductQty($item['product_id'], $item['quantity']);

        if (!empty($item['additions'])) {
            $additions = $item['additions'];

            foreach($item['additions'] as $addition) {
                minusProductQty($addition['product_id'], $addition['quantity']);
            }
        }

        $data['additions'] = json_encode($additions);
        $query->execute($data);
    }
}

function minusProductQty(int $id, int $quantity)
{
    $query = "UPDATE " . Tables::Products->value . " SET quantity = (quantity - :quantity) WHERE id = :id";
    $query = DB::connect()->prepare($query);
    $query->execute(compact('id', 'quantity'));
}

function insertOrder(int $user_id, float $total): int
{
    $query = "INSERT INTO " . Tables::Orders->value . " (user_id, total) VALUES (:user_id, :total)";
    $query = DB::connect()->prepare($query);

    $query->execute(compact('user_id', 'total'));

    return (int) DB::connect()->lastInsertId();
}
<?php

function createProduct(array $data)
{
    $data['is_option'] = $data['is_option']?? 0;
    validateCreateProductData($data);

    $query = 'INSERT INTO ' . Tables::Products->value . ' (name, description, quantity, price, is_option) VALUES (:name, :description, :quantity, :price, :is_option)';
    $query = DB::connect()->prepare($query);
    try {
        $query->execute($data);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }

    notify("Product '{$data['name']}' was created!");
    $query = "SELECT id FROM products WHERE name='{$data['name']}'";
    $query = DB::connect()->prepare($query);
    try {
        $query->execute();
        $productId = $query->fetch();
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
    redirect('/admin/products/edit/' . $productId['id']);
}

function validateCreateProductData(array $data)
{
    unset($_SESSION['create_product']);
    $_SESSION['create_product']['fields'] = $data;

    unset($data['description']);
    $isEmptyFields = emptyFields($data, 'create_product');
    $isNegativeValues = !validateProductDataOnZero($data['price'], $data['quantity']);
    conditionRedirect(($isEmptyFields || $isNegativeValues), '/admin/products/create');
}

function validateProductDataOnZero(float $price, int $quantity): bool
{
    $result = true;
    $fields = compact('price', 'quantity');

    foreach ($fields as $key => $field) {
        if ($field <= 0) {
            $_SESSION['create_product']['errors'][$key] = 'Value should be more than 0';
            $result = false;
        }
    }

    return $result;
}

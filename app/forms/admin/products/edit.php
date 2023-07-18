<?php
function editProduct(array $data)

{
    $data['is_option'] = $data['is_option']?? 0;
    validateUpdateProductData($data);

    $nameUpdate = $data['name'];
    $query = 'UPDATE products SET name=:name, description=:description, quantity=:quantity, price=:price WHERE id=:product_id';
    $query = DB::connect()->prepare($query);
    try {
        unset($data["is_option"]);
        $query->execute($data);
    } catch (\Exception $e) {
        dd($e->getMessage());
    }
    notify("Product '{$data['name']}' was update!");
    redirect('/admin/products/edit/' . $data['product_id']);
}

function validateUpdateProductData(array $data)
{


    unset($data['description']);
    $isEmptyFields = emptyFields($data, 'edit_product');
    $isNegativeValues = !validateProductDataOnZeroEdit($data['price'], $data['quantity']);
    conditionRedirect(($isEmptyFields || $isNegativeValues), '/admin/products/edit/' . $data['product_id']);
}

function validateProductDataOnZeroEdit(float $price, int $quantity): bool
{
    $result = true;
    $fields = compact('price', 'quantity');

    foreach ($fields as $key => $field) {
        if ($field <= 0) {
            $_SESSION['edit_product']['errors'][$key] = 'Value should be more than 0';
            $result = false;
        }
    }

    return $result;
}

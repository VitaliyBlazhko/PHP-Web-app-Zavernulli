<?php
function showMainProductsTable()
{
    includeTable(showProductsTable());
}

function showAdditionalProductsTable()
{
    includeTable(showProductsTable(true));
}

function showProductsTable(bool $isAddition = false)
{
    $condition = $isAddition ? 'TRUE' : 'FALSE';
    return dbSelect(Tables::Products, conditions: " is_option = {$condition}");
}

function includeTable(array $products = [])
{
    if (empty($products)) {
        echo '<h5>There are no products in this category</h5>';
    } else {
        include ADMIN_PAGES_DIR . '/products/parts/table.php';
    }
}

function getEditProduct(string $url)
{
    $url = array_reverse(explode('/', $url));
    $productId = (int) $url[0];

    return dbFind(Tables::Products, $productId);
}

function removeProduct(int $id)
{
    $query = "DELETE FROM " . Tables::Products->value . " WHERE id = :id";
    $query = DB::connect()->prepare($query);

    $query->bindParam('id', $id, PDO::PARAM_INT);

    $query->execute();

    redirect('/admin/products');
}

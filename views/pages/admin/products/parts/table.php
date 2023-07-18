<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Actions</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($products as $number => $product) : ?>
        <tr>
            <td><?= $number + 1 ?></td>
            <td><?= $product['name'] ?></td>
            <td><?= $product['price'] ?></td>
            <td><?= $product['quantity'] ?></td>
            <td>
                <form action="/" method="POST">
                    <input type="hidden" name="type" value="remove_product" />
                    <input type="hidden" name="product_id" value="<?= $product['id'] ?>" />
                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="/admin/products/edit/<?= $product['id'] ?>" class="btn btn-info"><i class="fa-solid fa-pen"></i></a>
                        <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
                    </div>
                </form>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
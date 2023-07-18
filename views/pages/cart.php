<?php
$cart = getCartItems();
$total = $cart['total'];
unset($cart['total']);

require PARTS_DIR . '/header.php';
?>
<section id="cart" style="padding-top: 64px;">
    <div class="container">
        <div class="row">
            <div class="col-2"></div>
            <div class="col-8">
                <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
                    <h1 class="display-4 fw-normal">Cart</h1>
                </div>
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Remove</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php foreach ($cart as $number => $item):
                            $parentNumber = $number + 1;
                            ?>
                            <tr>
                                <td><?= $parentNumber ?></td>
                                <td><?= $item['name'] ?></td>
                                <td><?= $item['price'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td><?= $item['total'] ?></td>
                                <td>
                                    <form action="/" method="POST">
                                        <input type="hidden" name="type" value="remove_cart_item" />
                                        <input type="hidden" name="product_key" value="<?= $number ?>">
                                        <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                            <?php if (!empty($item['additions'])): ?>
                            <?php foreach ($item['additions'] as $subNumber => $addition): ?>
                                <tr class="addition" style="background: #9a9086;">
                                    <td><?= "{$parentNumber}." . $subNumber + 1 ?></td>
                                    <td><?= $addition['name'] ?></td>
                                    <td><?= $addition['price'] ?></td>
                                    <td><?= $addition['quantity'] ?></td>
                                    <td><?= $addition['total'] ?></td>
                                    <td>
                                        <form action="/" method="POST">
                                            <input type="hidden" name="type" value="remove_cart_item" />
                                            <input type="hidden" name="product_key" value="<?= $subNumber ?>">
                                            <input type="hidden" name="parent_key" value="<?= $number ?>">
                                            <button type="submit" class="btn btn-outline-danger"><i class="fa-solid fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <br>
                <br>
                <div class="text-center" style="width: 100%">
                    <?php if (isLoggedIn()): ?>
                        <form action="/" method="POST">
                            <input type="hidden" name="type" value="create_order" />
                            <button type="submit" class="btn btn-outline-success">Create order</button>
                        </form>
                    <?php else: ?>
                        <h4>You're not logged in</h4>
                        <p>Please log in for proceed to checkout</p>
                        <a href="/login" class="btn btn-outline-primary">Log in</a>
                    <?php endif; ?>
                </div>
            </div>
            <div class="col-2"></div>
        </div>
    </div>
</section>
<?php require PARTS_DIR . '/footer.php'; ?>
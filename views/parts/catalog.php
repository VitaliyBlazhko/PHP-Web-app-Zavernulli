<?php
$products = dbSelect(Tables::Products, conditions: ' is_option = FALSE');
$products = array_chunk($products, 3);
?>
<section id="catalog" class="section-gap">
    <div class="container">
        <?php if (!empty($catalog ['title'])): ?>
            <div class="row title-row section-gap">
                <h1 class="mb-10"><?= $catalog ['title'] ?? '' ?></h1>
                <p><?= $catalog ['description'] ?? '' ?></p>
            </div>
        <?php endif; ?>
        <?php foreach ($products as $row): ?>
            <div class="row">
                <?php foreach ($row as $product): ?>
                    <div class="col-4 catalog-item"
                         data-id="<?= $product['id'] ?>"
                         data-qty="<?= $product['quantity'] ?>"
                         data-name="<?= $product['name'] ?>"
                         data-price="<?= $product['price'] ?>"
                    >
                        <div class="single-menu" data-bs-toggle="modal" data-bs-target="#byePopup">
                            <div class="title-div d-flex justify-content-between">
                                <h4><?= $product['name'] ?></h4>
                                <p class="price float-right">$<?= $product['price'] ?></p>
                            </div>
                            <p><?= $product['description'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
</section>
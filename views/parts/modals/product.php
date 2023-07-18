<?php
$additions = dbSelect(
    Tables::Products,
    columns: "id, name, quantity, price",
    conditions: "is_option = TRUE AND quantity > 0",
    order: "price"
);
?>

<div class="modal fade" id="byePopup" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="byePopupLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialogWidth" >
    <div class="modal-content">
        <form action="/" method="POST" id="buy-form">
            <input type="hidden" name="type" value="add_to_cart" />
            <input type="hidden" name="product_id" />
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="buyPopupLabel">Buy Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="col">Product</th>
                            <th class="col">Price per unit</th>
                            <th class="col">Quantity</th>
                            <th class="col">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="product-name"></td>
                            <td class="product-price">
                                <span class="price"></span><span>$</span>
                            </td>
                            <td class="product-qty">
                                <input type="number" name="quantity" class="quantity-field" min="1" value="1" />
                            </td>
                            <td class="product-total">
                                <span class="price"></span><span>$</span>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="row">
                    <h3>Additions</h3>
                    <?php foreach($additions as $addition): ?>
                        <div class="col-4 additions-item">
                            <label for="chk-1">
                                <b><?= $addition['name'] ?></b>
                                - <span class="additions-price"><?= $addition['price'] ?></span>$
                                <span class="additions-total-wrapper d-none">
                                        - <span class="additions-total"><?= $addition['price'] ?></span>$
                                    </span>
                            </label>
                            <div class="input-group mb-3 additions-item-wrapper">
                                <div class="input-group-text">
                                    <input class="form-check-input mt-0 additions-check"
                                           id="addition-<?= $addition['id'] ?>"
                                           role="switch"
                                           type="checkbox"
                                           value="<?= $addition['id'] ?>"
                                           name="additions[]"
                                    >
                                </div>
                                <input type="number"
                                       class="form-control additions-qty"
                                       value="0"
                                       id="addition-qty-<?= $addition['id'] ?>"
                                       max="<?= $addition['quantity'] ?>"
                                       name="additions_qty[]"
                                       disabled
                                >
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="row">
                    <div class="col-12" style="text-align: right;">
                        Total: <b class="final-price"></b><b>$</b>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add to cart</button>
            </div>
        </form>
    </div>
  </div>
</div>

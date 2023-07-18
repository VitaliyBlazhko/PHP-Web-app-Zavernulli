<?php
require_once ADMIN_PARTS_DIR . '/header.php';
$fields = [];
if (!empty($_SESSION['create_product']['fields'])) {
    $fields = $_SESSION['create_product']['fields'];
    unset($_SESSION['create_product']['fields']);
}
?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-10">
                <div class="card">
                    <div class="card-header">
                        <h3>Create Product</h3>
                    </div>
                    <div class="card-body">
                        <form action="/" method="POST">
                            <input type="hidden" name="type" value="create_product"/>
                            <div class="form-check form-switch">
                                <input class="form-check-input"
                                       type="checkbox"
                                       role="switch"
                                       id="is_option"
                                       name="is_option"
                                       value="1"
                                    <?= (!empty($fields['is_option']) && $fields['is_option']) ? 'checked' : '' ?>
                                >
                                <label class="form-check-label" for="is_option">Is an addition product?</label>
                            </div>
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" class="form-control" id="name" name="name" value="<?= $fields['name'] ?? '' ?>">
                            </div>
                            <?= formError($_SESSION['create_product']['errors']['name'] ?? null) ?>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" class="form-control" id="description" cols="30" rows="10"><?= $fields['description'] ?? '' ?></textarea>
                            </div>
                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control" id="quantity" name="quantity" min="1" value="<?= $fields['quantity'] ?? 1 ?>" />
                            </div>
                            <?= formError($_SESSION['create_product']['errors']['quantity'] ?? null) ?>
                            <div class="mb-3">
                                <label for="price" class="form-label">Price</label>
                                <input type="number" class="form-control" id="price" step="0.1" name="price" value="<?= $fields['price'] ?? 0.1 ?>" />
                            </div>
                            <?= formError($_SESSION['create_product']['errors']['price'] ?? null) ?>

                            <button type="submit" class="btn btn-primary">Create</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
if (!empty($_SESSION['create_product']['errors'])) {
    unset($_SESSION['create_product']['errors']);
}
require_once ADMIN_PARTS_DIR . '/footer.php';

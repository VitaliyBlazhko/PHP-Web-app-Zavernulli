<?php
require_once ADMIN_PARTS_DIR . '/header.php';
?>
    <div class="container">
        <div class="row mt-5">
            <div class="col-2"></div>
            <div class="col-10 text-center">
                <h3>Main Products</h3>
                <?php showMainProductsTable() ?>

                <br>
                <br>

                <h3>Additional Products</h3>
                <?php showAdditionalProductsTable(); ?>
            </div>
        </div>
    </div>
<?php
require_once ADMIN_PARTS_DIR . '/footer.php';

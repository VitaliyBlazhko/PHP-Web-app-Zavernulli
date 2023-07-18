const selectors = {
    modal: {
        form: '#buy-form',
        productId: 'input[name="product_id"]',
        product: {
            name: '.product-name',
            price: '.product-price .price',
            qty: '.product-qty .quantity-field',
            total: '.product-total .price',
        },
        additions: {
            item: '.additions-item',
            checkbox: '.additions-check',
            wrapper: '.additions-item-wrapper',
            qty: '.additions-qty',
            price: '.additions-price',
            total: {
                wrapper: '.additions-total-wrapper',
                price: '.additions-total-wrapper .additions-total',
            }
        },
        total: '.final-price'
    },
    catalogItem: '.catalog-item'
};

$(document).on('click', selectors.catalogItem, function() {
    const productData = $(this).data();
    const $form = $(selectors.modal.form);
    const $qtyProductField = $form.find(selectors.modal.product.qty);

    $qtyProductField.attr('max', productData.qty);
    $qtyProductField.val(1);

    $(selectors.modal.product.name).text(productData.name);
    $(selectors.modal.product.price).text(productData.price);
    $(selectors.modal.product.total).text(productData.price);
    $form.find(selectors.modal.productId).val(productData.id);

    calculateFinalPrice();
});

$(document).on('change', `${selectors.modal.form} ${selectors.modal.product.qty}`, function () {
    const qty = $(this).val();
    const price = parseFloat($(selectors.modal.product.price).text());

    $(selectors.modal.product.total).text(qty * price);
    calculateFinalPrice();
});

$(document).on('change', selectors.modal.additions.checkbox, function () {
    const $parent = $(this).parents(selectors.modal.additions.item);
    const $qtyField = $parent.find(selectors.modal.additions.qty);
    const $totalWrapper = $parent.find(selectors.modal.additions.total.wrapper);

    if ($(this).prop('checked')) {
        $qtyField.prop('disabled', false).val(1);
        $totalWrapper.removeClass('d-none');
    } else {
        $qtyField.prop('disabled', true).val(0);
        $totalWrapper.addClass('d-none');
    }
    calculateFinalPrice();
});

$(document).on('change', `${selectors.modal.form} ${selectors.modal.additions.qty}`, function () {
    const $parent = $(this).parents(selectors.modal.additions.item);
    const qty = $(this).val();
    const price = parseFloat($parent.find(selectors.modal.additions.price).text());

    $parent.find(selectors.modal.additions.total.price).text(qty * price);
    calculateFinalPrice();
});

function calculateFinalPrice() {
    let productTotal = parseFloat($(selectors.modal.product.total).text());
    const additions = $(`${selectors.modal.additions.checkbox}:checked`);

    if (additions.length > 0) {
        additions.toArray().map((el) => {
            const $parent = $(el).parents(selectors.modal.additions.item);
            const total = parseFloat($parent.find(selectors.modal.additions.total.price).text());

            productTotal += total;
        });
    }

    $(selectors.modal.total).text(productTotal);
}
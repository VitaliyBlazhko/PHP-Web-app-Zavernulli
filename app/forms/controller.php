<?php

match (getRequestType()) {
    'add_to_cart' => addToCart(addToCartParams()),
    'remove_cart_item' => removeCartItem(removeCartItemParams()),
    'registration' => createUser(createUserParams()),
    'login' => authUser(authUserParams()),
    'create_order' => createOrder(),
    'create_product' => createProduct(createProductParams()),
    'edit_product' => editProduct(editProductParams()),
    'remove_product' => removeProduct(removeProductParams()),
    'edit_content' => updateContent(),
    default => redirect()
};
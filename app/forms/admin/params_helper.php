<?php

function createProductParams()
{
    $options = [
        'name' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'description' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'price' => FILTER_VALIDATE_FLOAT,
        'quantity' => FILTER_VALIDATE_INT,
        'is_option' => FILTER_VALIDATE_BOOLEAN
    ];
    return filter_input_array(INPUT_POST, $options);
}



function editProductParams()
{
    $options = [
        'product_id' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_int'
        ],
        'name' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'description' => [
            'flags' => FILTER_CALLBACK,
            'filter' => 'is_string'
        ],
        'price' => FILTER_VALIDATE_FLOAT,
        'quantity' => FILTER_VALIDATE_INT,
        'is_option' => FILTER_VALIDATE_BOOLEAN
    ];

    return filter_input_array(INPUT_POST, $options);
}

function removeProductParams()
{
    return filter_input(INPUT_POST, 'product_id', FILTER_VALIDATE_INT);
}
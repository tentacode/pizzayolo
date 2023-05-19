<?php

function euro_price(string $price): string
{
    return number_format($price, 2, ',', ' ') . ' €';
}

function discount_price(array $pizza): string
{
    $discountPrice = $pizza['price'] - $pizza['discount'];

    return euro_price($discountPrice);
}

function count_pizzas_in_basket(): int
{
    if (!isset($_SESSION['basket'])) {
        return 0;
    }

    $count = 0;
    foreach ($_SESSION['basket']['pizzas'] as $pizza) {
        $count += $pizza['quantity'];
    }

    return $count;
}
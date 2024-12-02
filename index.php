<?php

require_once("autoloader.php");

use Model\Customer;
use Service\CartService;
use Strategy\Output\OutputStrategy;

$moviesToRent = '[
    {"name":"Prognosis Negative","classification":"NEW_RELEASE","daysRented":"3"},
    {"name":"Sack Lunch","classification":"CHILDRENS","daysRented":"1"},
    {"name":"The Pain and the Yearning","classification":"REGULAR","daysRented":"1"}
]';

$cart = CartService::addRentalsToCart(
    new Customer("Susan Ross"),
    json_decode($moviesToRent, true)
);

$output = (new OutputStrategy)(
    $_REQUEST['output'] ?? '' === 'html',
    $cart->toDto()
);

$output->renderNavigation();
echo '<pre>';
echo $output->renderStatement();
echo '</pre>';

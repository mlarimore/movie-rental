<?php

require_once("autoloader.php");

use Model\Customer;
use Service\CartService;
use Service\RentalGenerator;
use Strategy\Output\OutputStrategy;

$cart = new CartService(new Customer("Susan Ross"));

$moviesToRent = '[
    {"name":"Prognosis Negative","classification":"NEW_RELEASE","daysRented":"3"},
    {"name":"Sack Lunch","classification":"CHILDRENS","daysRented":"1"},
    {"name":"The Pain and the Yearning","classification":"REGULAR","daysRented":"1"}
]';

foreach(RentalGenerator::loadRentals($moviesToRent)->validRentals() as $rental) {
    $cart->addRental($rental);
}

$output = (new OutputStrategy)(
    $_REQUEST['output'] ?? '' === 'html',
    $cart->cartDto()
);

$output->renderNavigation();
echo '<pre>';
echo $output->renderStatement();
echo '</pre>';

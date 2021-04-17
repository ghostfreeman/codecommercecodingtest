<?php

require_once('vendor/autoload.php');
require_once("Enums/MovieType.php");
require_once('Movie.php');
require_once('Rental.php');
require_once('Customer.php');

use MovieStore\Models\Rental;
use MovieStore\Models\Movie;
//use MovieStore\Customer;
use MovieStore\Enums\MovieType;

$rental1 = new Rental(
    new Movie(
        'Back to the Future',
        MovieType::Childrens
    ), 4
);

$rental2 = new Rental(
    new Movie(
        'Office Space',
        MovieType::Regular
    ), 3
);

$rental3 = new Rental(
    new Movie(
        'The Big Lebowski',
        MovieType::NewRelease
    ), 5
);

$customer = new Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);

echo $customer->statement();
echo PHP_EOL;
echo $customer->htmlStatement();

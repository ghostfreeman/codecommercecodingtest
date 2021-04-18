<?php

require_once('vendor/autoload.php');

$rental1 = new \Models\Rental(
    new \Models\Movie(
        'Back to the Future',
        \Enums\MovieType::Childrens
    ), 4
);

$rental2 = new \Models\Rental(
    new \Models\Movie(
        'Office Space',
        \Enums\MovieType::Regular
    ), 3
);

$rental3 = new \Models\Rental(
    new \Models\Movie(
        'The Big Lebowski',
        \Enums\MovieType::NewRelease
    ), 5
);

$rental4 = new \Models\Rental(
    new \Models\Movie(
        'RoboCop',
        \Enums\MovieType::Scifi
    ), 2
);

$rental5 = new \Models\Rental(
    new \Models\Movie(
        'Seven Samurai',
        \Enums\MovieType::Foreign
    ), 2
);

$customer = new \Models\Customer('Joe Schmoe');

$customer->addRental($rental1);
$customer->addRental($rental2);
$customer->addRental($rental3);
$customer->addRental($rental4);
$customer->addRental($rental5);

$customer->CalculateTotals();

echo $customer->statement();
echo PHP_EOL;
echo $customer->htmlStatement();

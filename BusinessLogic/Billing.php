<?php

//namespace MovieStore\BusinessLogic;
namespace BusinessLogic;

class Billing
{
    /**
     * Calculates the movie rental cost based on the stored rental data. Additional
     * pricing data can be added as the needs require by extending the logic below
     * with new private methods.
     *
     * @param Rental $rental
     * @return void
     */
    public function GenerateMovieRentCost(\Models\Rental $rental) {
        $subtotal = 0;

        // When new checkout cases must be accounted for, extend the switch/case and
        // define a new static function below
        switch ($rental->movie()->priceCode()) {
            case \Enums\MovieType::Regular:
                $subtotal += $this->CalculateRegularCost($rental->daysRented());
                break;
            case \Enums\MovieType::NewRelease:
                $subtotal += $this->CalculateNewReleaseCost($rental->daysRented());
                break;
            case \Enums\MovieType::Childrens:
                $subtotal += $this->CalculateChildrensFilmCost($rental->daysRented());
                break;
            default:
                break;
        }

        return $subtotal;
    }
    
    /**
     * Calculates the cost of a Rental based on its days rented.
     *
     * @param int $days
     * @return float
     */
    private static function CalculateRegularCost($days)
    {
        $thisAmount = 2;
        if ($days > 2) {
            $thisAmount += ($days - 2) * 1.5;
        }

        return $thisAmount;
    }

    /**
     * Calculates the cost of a rental based on its days rented, intended for New
     * Releases.
     *
     * @param int $days
     * @return int|float
     */
    private static function CalculateNewReleaseCost($days)
    {
        return $days * 3;
    }

    /**
     * Calculates the cost of a rental based on its days rented. Intended for
     * movies under the "Children's" classification.
     *
     * @param int $days
     * @return float
     */
    private static function CalculateChildrensFilmCost($days)
    {
        $thisAmount = 1.5;
        if ($days > 3) {
            $thisAmount += ($days - 3) * 1.5;
        }

        return $thisAmount;
    }
}
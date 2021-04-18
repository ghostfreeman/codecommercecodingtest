<?php

namespace BusinessLogic;

class FrequentRenterPoints
{
    /**
     * Returns the number of points the Rental is eligible for.
     *
     * Additional functionality can be added by extending the below logic with
     * private methods as the needs require.
     * 
     * @param Rental $rental
     * @return void
     */
    public function GeneratePoints($rental) {
        $points = 1;

        // Below, you can add additional internal methods against
        // The rentals to adjust the number of points assigned.
        if ($this->NewReleasePoints($rental) || $this->ForeignFilmPoints($rental) ) {
            $points++;
        }

        return $points;
    }

    /**
     * Confirms if the rental is eligible for new release points additions.
     *
     * @param Rental $rental
     * @return boolean
     */
    private static function NewReleasePoints($rental)
    {
        if (($rental->movie()->priceCode() === \Enums\MovieType::NewRelease) && ($rental->daysRented() > 1)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Confirms if the rental is eligible for Foreign Films points additions
     */
    private static function ForeignFilmPoints($rental)
    {
        if (($rental->movie()->priceCode() === \Enums\MovieType::Foreign) && ($rental->daysRented() > 1)) {
            return true;
        } else {
            return false;
        }
    }
}
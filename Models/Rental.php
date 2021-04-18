<?php

namespace Models;

class Rental
{
    /**
     * The Movie Object for the Rental.
     * 
     * @var Movie
     */
    private $movie;

    /**
     * Integer representing the days the rental was rented.
     * 
     * @var int
     */
    private $daysRented;

    /**
     * Constructor
     * 
     * @param Movie $movie
     * @param int $daysRented
     */
    public function __construct(Movie $movie, $daysRented)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
    }

    /**
     * Returns the Movie Object
     * 
     * @return Movie
     */
    public function movie()
    {
        return $this->movie;
    }

    /**
     * Returns the number of days the movie was rented.
     * 
     * @return int
     */
    public function daysRented()
    {
        return $this->daysRented;
    }
}

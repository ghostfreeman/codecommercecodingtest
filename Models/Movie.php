<?php

namespace Models;

class Movie
{
    /**
     * Name of the Movie.
     * 
     * @var string
     */
    private $name;

    /**
     * The Price code for the Movie. This must be a Enum from the MovieType enum.
     * 
     * @var int
     */
    private $priceCode;

    /**
     * Constructor
     * 
     * @param string $name
     * @param int $priceCode
     */
    public function __construct($name, $priceCode)
    {
        $this->name = $name;
        $this->priceCode = $priceCode;
    }

    /**
     * Returns the Movie Name.
     * 
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * Returns the Movie Price Code
     * 
     * @return int
     */
    public function priceCode()
    {
        return $this->priceCode;
    }
}

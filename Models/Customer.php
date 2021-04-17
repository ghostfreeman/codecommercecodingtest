<?php

namespace Models;

class Customer
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var Rental[]
     */
    private $rentals;

    /**
     * Undocumented variable
     *
     * @var [type]
     */
    private $points;

    /**
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->rentals = [];
    }

    /**
     * @return string
     */
    public function name()
    {
        return $this->name;
    }

    /**
     * @param Rental $rental
     */
    public function addRental(\Models\Rental $rental)
    {
        $this->rentals[] = $rental;
    }

    /**
     * Undocumented function
     *
     * @return void
     */
    public function CalculateTotals()
    {
        foreach($this->rentals as $rental) {
            $amount = 0;

            $Billing = new \BusinessLogic\Billing();
            $Points = new \BusinessLogic\FrequentRenterPoints();
            $this->total += $Billing->GenerateMovieRentCost($rental);
            $this->points += $Points->GeneratePoints($rental);
        }
    }

    /**
     * @return string
     */
    public function statement()
    {
        $result = 'Rental Record for ' . $this->name() . PHP_EOL;

        foreach ($this->rentals as $rental) {
            $amount = 0;
            $Billing = new \BusinessLogic\Billing();
            $amount = $Billing->GenerateMovieRentCost($rental); 
            $result .= "\t" . str_pad($rental->movie()->name(), 30, ' ', STR_PAD_RIGHT) . "\t" . $amount . PHP_EOL; //*/
        }

        $result .= 'Amount owed is ' . $this->total . PHP_EOL;
        $result .= 'You earned ' . $this->points . ' frequent renter points' . PHP_EOL;
        
        return $result;
    }

    /**
     * Renders the statement as a block of HTML
     *
     * @return void
     */
    public function htmlStatement($renderAsDocument = false)
    {
        $result = "";

        if ($renderAsDocument) {
            $result = "<!doctype html>\n<html>\n\t<head>\n\t\t<title>Report Output</title>\n\t</head>\n<body>\n";
        }

        $result .= '<h1>Rental Record for ' . $this->name() . "</h1>" . PHP_EOL;
        $result .= "\t<ul>" . PHP_EOL;

        foreach ($this->rentals as $rental) {
            $RentCostObj = new \BusinessLogic\Billing();
            $thisAmount = $RentCostObj->GenerateMovieRentCost($rental);
            $result .= "\t\t<li>" . $rental->movie()->name() . " - " . $thisAmount . "</li>\n"; //PHP_EOL;
        }

        $result .= "\t</ul>" . PHP_EOL;
        $result .= '<p>Amount owed is ' . $this->total . "</p>" . PHP_EOL;
        $result .= '<p>You earned ' . $this->points . ' frequent renter points</p>' . PHP_EOL;

        if ($renderAsDocument) {
            $result .= "</body>\n</html>";
            file_put_contents("CustomerReport-$this->name.html", $result);
            echo "Additionally, this report has been generated as an HTML document, CustomerReport-" . $this->name . ".html.\n";
            $result = null;
        }

        return $result;
    }
}

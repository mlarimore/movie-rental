<?php
namespace Service;

use Model\CartDto;
use Model\Classification;
use Model\Customer;
use Model\Movie;
use Model\Rental;

class CartService
{
    public $customer;
    private $rentals = array();
    private $totalAmount;
    private $frequentRenterPoints = 0;

    /**
     * @param Customer $customer
     */
    public function __construct(Customer $customer)
    {
        $this->customer = $customer;
    }

    public function addRental(Rental $rental)
    {
        array_push($this->rentals, $rental);
    }

    public function getTotalAmount(): float
    {
        $this->totalAmount = 0;
        foreach ($this->rentals as $rental) {
            $this->totalAmount += $rental->price();
        }

        return $this->totalAmount;
    }

    public function getFrequentRenterPoints(): int
    {
        $this->frequentRenterPoints = 0;
        foreach ($this->rentals as $rental) {
            $this->frequentRenterPoints += $rental->frequentPoints();
        }

        return $this->frequentRenterPoints;
    }

    public function cartDto()
    {
        return new CartDto(
            $this->customer->getName(),
            $this->rentals,
            $this->getTotalAmount(),
            $this->getFrequentRenterPoints(),
            dirname(__DIR__) . '/views/statement/view.php'
        );
    }
}

<?php
namespace Model\Price;

use Model\Type\TypeInterface;

abstract class Price implements TypeInterface
{
    protected $allowedDays = 2;
    protected $cost;
    protected $extendedCost;
    protected $lateFee;
    protected $rentalPrice = 0;

    public function rentalPrice(?int $daysRented = null)
    {
        $daysRented = $daysRented ?? $this->allowedDays;
        if ($this->extendedCost && $this->allowedDays && $daysRented > $this->allowedDays) {
            $this->rentalPrice += $this->allowedDays * $this->cost;
            $this->rentalPrice += ($daysRented - $this->allowedDays) * $this->extendedCost;
        } else {
            $this->rentalPrice += $daysRented * $this->cost;
        }

        return $this->rentalPrice;
    }

    public function getLateFee(): float
    {
        return $this->lateFee;
    }
}

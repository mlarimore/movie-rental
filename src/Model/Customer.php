<?php
namespace Model;

class Customer
{
    private $name;
    private $frequentRenterPoints = 0;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function addFrequentRenterPoints(int $points)
    {
        $this->frequentRenterPoints += $points;
    }

    public function getFrequentRenterPoints(): int
    {
        return $this->frequentRenterPoints;
    }
}

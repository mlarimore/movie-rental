<?php
namespace Model;

use Model\Movie;
use Model\Price\PriceFactory;

class Rental
{
    private $movie;
    private $daysRented;
    private $price;

    public function __construct(Movie $movie, int $daysRented, int $price)
    {
        $this->movie = $movie;
        $this->daysRented = $daysRented;
        $this->price = $price;
    }

    public function movie(): Movie
    {
        return $this->movie;
    }

    public function daysRented(): int
    {
        return $this->daysRented;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function frequentPoints(): int
    {
        return $this->movie->isNewRelease() ? 2 : 1;
    }
}

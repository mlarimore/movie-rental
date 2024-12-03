<?php
namespace Service;

use Generator;
use InvalidArgumentException;
use Model\Classification;
use Model\Movie;
use Model\Price\PriceFactory;
use Model\Rental;

class RentalGenerator
{
    private function __construct(
        private array $validRentals
    )
    {
    }

    public static function loadRentals(string $moviesToRent)
    {
        try {
            $moviesToRent = json_decode($moviesToRent, true);
        } catch (\Throwable $th) {
            throw new InvalidArgumentException("Unreconizable set of movies to rent");
        }

        $validRentals = [];
        foreach($moviesToRent as $movieToRent) {
            try {
                $movie = new Movie(
                    $movieToRent['name'] ?? null,
                    new Classification($movieToRent['classification'] ?? null)
                );
                $price = (new PriceFactory)(
                    $movie->classification()
                )->rentalPrice($movieToRent['daysRented'] ?? null);
                $rental = new Rental(
                    $movie,
                    $movieToRent['daysRented'],
                    $price
                );
            } catch (\Throwable $th) {
                throw $th;
            }

            $validRentals[] = $rental;
        }

        return new RentalGenerator($validRentals);
    }

    public function validRentals() : Generator
    {
        foreach($this->validRentals as $rental) {
            yield $rental;
        }
    }
}

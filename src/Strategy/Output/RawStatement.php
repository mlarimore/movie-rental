<?php
namespace Strategy\Output;

use Model\CartDto;

class RawStatement implements OutputInterface
{
    private CartDto $cartDto;
    private function __construct(CartDto $cartDto)
    {
        $this->cartDto = $cartDto;
    }

    public static function loadCart(CartDto $cartDto) : RawStatement
    {
        return new RawStatement($cartDto);
    }
    public function renderNavigation()
    {
        echo '<a href="/?output=html" >HTML View</a>';
    }

    public function renderStatement()
    {
        $result = '';
        $result = "Rental Record for " . $this->cartDto->customer . "\n";
        foreach ($this->cartDto->rentals as $rental) {
            $result .= "\t" . $rental->movie()->title() . "\t" .
                            $rental->price() . "\n";
        }
        $result .= "Amount owed is " . $this->cartDto->totalAmount . "\n";
        $result .= "You earned " . $this->cartDto->frequentRenterPoints .
                    " frequent renter points";

        return $result;
    }
}

<?php
namespace Model;

class CartDto
{
    public function __construct(
        public readonly string $customer,
        public readonly array $rentals,
        public readonly string $totalAmount,
        public readonly string $frequentRenterPoints,
        public readonly string $template,
    )
    {
    }

    public function toArray() : array
    {
        return [
            'customer'  => $this->customer,
            'rentals' => $this->rentals,
            'totalAmount' => $this->totalAmount,
            'frequentRenterPoints' => $this->frequentRenterPoints,
            'template' => $this->template,
        ];
    }
}

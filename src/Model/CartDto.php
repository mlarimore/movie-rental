<?php
namespace Model;

class CartDto
{
    public readonly string $customer;
    public readonly array $rentals;
    public readonly string $totalAmount;
    public readonly string $frequentRenterPoints;
    public readonly string $template;

    public function __construct(
        string $customer,
        array $rentals,
        string $totalAmount,
        string $frequentRenterPoints,
        string $template
    )
    {
        $this->customer  = $customer;
        $this->rentals = $rentals;
        $this->totalAmount = $totalAmount;
        $this->frequentRenterPoints = $frequentRenterPoints;
        $this->template = $template;
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

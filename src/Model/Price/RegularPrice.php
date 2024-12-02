<?php
namespace Model\Price;

use Model\Type\ConstantsTypeTrait;

class RegularPrice extends Price
{
    use ConstantsTypeTrait;

    const REGULAR = 1;
    public function __construct()
    {
        $this->cost = 2;
        $this->extendedCost = 1.5;
        $this->lateFee = 5;
    }
}

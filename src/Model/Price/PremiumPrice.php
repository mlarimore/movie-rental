<?php
namespace Model\Price;

use Model\Type\ConstantsTypeTrait;

class PremiumPrice extends Price
{
    use ConstantsTypeTrait;

    const PREMIUM = 1;
    public function __construct()
    {
        $this->cost = 3;
        $this->lateFee = 10;
        $this->extendedCost = 1.5;
    }
}

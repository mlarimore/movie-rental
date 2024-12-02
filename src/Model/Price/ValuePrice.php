<?php
namespace Model\Price;

use Model\Type\ConstantsTypeTrait;

class ValuePrice extends Price
{
    use ConstantsTypeTrait;

    const VALUE = 1;
    public function __construct()
    {
        $this->cost = 1.5;
        $this->lateFee = 3;
        $this->extendedCost = null;
    }
}

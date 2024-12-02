<?php
namespace Model\Price;

use Model\Classification;
use Model\Price\PremiumPrice;
use Model\Price\Price;
use Model\Price\RegularPrice;
use Model\Price\ValuePrice;

class PriceFactory
{
    public function __invoke(
        Classification $classification
    ) : Price {

        return match (true) {
            PremiumPrice::hasTypeKey($classification->getPriceType()) =>
                new PremiumPrice(),
            ValuePrice::hasTypeKey($classification->getPriceType()) =>
                new ValuePrice(),
            default => new RegularPrice(),
        };
    }
}

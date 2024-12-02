<?php
namespace Strategy\Output;

use Model\CartDto;

class OutputStrategy
{
    public function __invoke(
        string $outputType,
        CartDto $cartDto
    ) : OutputInterface {

        if($outputType ?? '' === 'html'){
            return HtmlStatement::loadCart($cartDto);
        }

        return RawStatement::loadCart($cartDto);
    }
}

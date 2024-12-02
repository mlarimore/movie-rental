<?php
namespace Strategy\Output;

class OutputStrategy
{
    public function __invoke(
        string $outputType,
        array $cartDto
    ) : OutputInterface {

        if($outputType ?? '' === 'html'){
            return HtmlStatement::loadCart($cartDto);
        }

        return RawStatement::loadCart($cartDto);
    }
}

<?php
namespace Strategy\Output;

use Model\CartDto;

interface OutputInterface
{
    public static function loadCart(CartDto $cartDto) : self;
    public function renderNavigation();
    public function renderStatement();
}

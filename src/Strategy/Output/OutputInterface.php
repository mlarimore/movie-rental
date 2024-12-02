<?php
namespace Strategy\Output;

interface OutputInterface
{
    public static function loadCart(array $cartDto) : self;
    public function renderNavigation();
    public function renderStatement();
}

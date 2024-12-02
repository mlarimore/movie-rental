<?php
namespace Strategy\Output;

class HtmlStatement implements OutputInterface
{
    private $cartDto = [];
    private function __construct(array $cartDto)
    {
        $this->cartDto = $cartDto;
    }

    public static function loadCart(array $cartDto) : HtmlStatement
    {
        if (!is_file($cartDto['template'])) {
            throw new \RuntimeException('Template file not found: ');
        }

        return new HtmlStatement($cartDto);
    }

    public function renderNavigation()
    {
        echo '<a href="." >Text View</a>';
    }

    public function renderStatement()
    {
        // define a closure with a scope for the variable extraction
        $result = function ($file, array $data = array()) {
            ob_start();
            extract($data, EXTR_SKIP);
            try {
                include $file;
            } catch (\Exception $e) {
                ob_end_clean();
                throw $e;
            }
            return ob_get_clean();
        };

        echo $result($this->cartDto['template'], $this->cartDto);
    }
}
<?php
namespace Model;

use Exception;
use Model\Type\ConstantsTypeTrait;

class Classification
{
    use ConstantsTypeTrait;

    const REGULAR = 'REGULAR';
    const NEW_RELEASE = 'PREMIUM';
    const CHILDRENS = 'VALUE';
    private $type;

    public function __construct(string $type)
    {
        $this->type = $this->hasType($type) ? $type : ($this->hasTypeKey($type) ? $this->getTypeValueByKey($type) : self::REGULAR);
    }

    public function getPriceType(): string
    {
        return $this->type;
    }

    public function getName(): string
    {
        return ucwords(str_replace("_", " ", $this->type));
    }

    public function isNewRelease()
    {
        return $this->type === self::NEW_RELEASE;
    }
}

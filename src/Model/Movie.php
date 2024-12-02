<?php
namespace Model;

use Model\Classification;

class Movie
{
    private $title;
    private $classification;

    public function __construct(string $title, Classification $classification)
    {
        $this->title = $title;
        $this->classification = $classification;
    }

    public function title(): string
    {
        return $this->title;
    }

    public function classification(): Classification
    {
        return $this->classification;
    }

    public function isNewRelease()
    {
        return $this->classification->isNewRelease();
    }
}

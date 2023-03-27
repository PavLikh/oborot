<?php

namespace App;

class Pear
{
    public $fruits;
    public $weight;

    public function __construct()
    {
        $this->fruits = rand(0,20);
        $this->weight = rand(130,170) * $this->fruits;
    }

    public function __clone()
    {
        $this->fruits = rand(0,20);
        $this->weight = rand(130,170) * $this->fruits;
    }

    public function getName()
    {
        return basename(str_replace('\\', '/', get_class($this)));
    }
}
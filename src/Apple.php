<?php

namespace App;

class Apple
{
    public $fruits;
    public $weight;

    public function __construct()
    {
        $this->fruits = rand(40,50);
        $this->weight = rand(150,180) * $this->fruits;
    }

    public function __clone()
    {
        $this->fruits = rand(40,50);
        $this->weight = rand(150,180) * $this->fruits;
    }

    public function getName()
    {
        return basename(str_replace('\\', '/', get_class($this)));
    }
}
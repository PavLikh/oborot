<?php

namespace App;

class Tree
{
    static $treeIds = 0;
    private $treeId;
    private $species;

    public function __construct($species = null)
    {
        $this->species = $species;
    }
    
    public function __clone()
    {
        $this->treeId = ++self::$treeIds;
        $this->species = clone $this->species;
    }

    public function getId()
    {
        return $this->treeId;
    }

    public function getSpaces()
    {
        return $this->species;
    }
}
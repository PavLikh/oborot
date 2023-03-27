<?php

use PHPUnit\Framework\TestCase;

class TreeTest extends TestCase
{
    private $tree;

    protected function setUp(): void
    {
        $treeProto = new \App\Tree(new \App\Apple);
        $this->tree = clone $treeProto;
    }

    public function testGetId()
    {
        $this->assertEquals(1, $this->tree->getId());
    }
}
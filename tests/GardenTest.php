<?php

use PHPUnit\Framework\TestCase;
use \App\Apple;

class GardenTest extends TestCase
{
    private $garden;

    protected function setUp(): void
    {
        $this->garden = new \App\Garden;
        $this->garden->addTrees(new Apple, 5);
    }

    public function testGetharvest()
    {
        $this->assertIsArray($this->garden->getHarvest());
    }

    public function testGetTrees()
    {
        $this->assertCount(5, $this->garden->getTrees());
    }

    public function testMinQnt()
    {
        $this->assertGreaterThan(200, $this->garden->getHarvest()['Apple']['quantity']);
    }

    public function testMinWeight()
    {
        $this->assertGreaterThan(5*150*40, $this->garden->getHarvest()['Apple']['weight']);
    }

    public function testSave()
    {
        $this->garden->save();
        $this->assertFileExists('garden.txt');
        unlink('garden.txt');
    }

    protected function tearDown(): void
    {
        unset($this->garden);

    }
    
}

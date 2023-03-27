<?php

namespace App;

use App\Tree;

class Garden
{
    private $trees;
    private $harvest;

    public function addTrees($tree, $qty) {
        $treeProto = new Tree($tree);
        for ($i=0; $i<$qty; $i++) {
            $tree = clone $treeProto;
            $this->trees[] = $tree;
        }
        $this->CalculateHarvest();
    }

    protected function CalculateHarvest() {
        foreach ($this->trees as $tree) {
            if (isset($this->harvest[$tree->getSpaces()->getName()]['quantity'])) {
                $this->harvest[$tree->getSpaces()->getName()]['quantity'] += $tree->getSpaces()->fruits;
            } else {
                $this->harvest[$tree->getSpaces()->getName()]['quantity'] = $tree->getSpaces()->fruits;
            }

            if (isset($this->harvest[$tree->getSpaces()->getName()]['weight'])) {
                $this->harvest[$tree->getSpaces()->getName()]['weight'] += $tree->getSpaces()->weight;
            } else {
                $this->harvest[$tree->getSpaces()->getName()]['weight'] = $tree->getSpaces()->weight;
            }

            if (isset($this->harvest[$tree->getSpaces()->getName()]['trees'])) {
                $this->harvest[$tree->getSpaces()->getName()]['trees']++;
            } else {
                $this->harvest[$tree->getSpaces()->getName()]['trees'] = 1;
            }
            
        }
    }

    public function getTrees() {
        return $this->trees;
    }

    public function getHarvest() {
        return $this->harvest;
    }

    public function save() {
        $data[] = $this->harvest;
        $json = json_encode($data);
        // file_put_contents('garden.txt', $json); 
        file_put_contents($_SERVER['DOCUMENT_ROOT'].'/garden.txt', $json); 
    }
}
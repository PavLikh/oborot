<?php

namespace App;

use App\Tree;

class Garden9
{
    private $trees;
    private $harvest;

    public function addTrees($tree, $qty) {
        $treeProto = new Tree($tree);
        $qauntity = 0;
        $weight = 0;
        for ($i=0; $i<$qty; $i++) {
            $tree = clone $treeProto;
            $arr['species'] = $tree->getSpaces()->getName();
            $arr['treeId'] = $tree->getId();
            $arr['fruits'] = $tree->getSpaces()->fruits;
            $arr['weight'] = $tree->getSpaces()->weight;
            $qauntity += $tree->getSpaces()->fruits;
            $weight += $tree->getSpaces()->weight;
            $this->trees[] = $arr;
        }
        if (isset($this->harvest[$treeProto->getSpaces()->getName()]['quantity'])) {
            $this->harvest[$treeProto->getSpaces()->getName()]['quantity'] += $qauntity;
        } else {
            $this->harvest[$treeProto->getSpaces()->getName()]['quantity'] = $qauntity;
        }

        if (isset($this->harvest[$treeProto->getSpaces()->getName()]['weight'])) {
            $this->harvest[$treeProto->getSpaces()->getName()]['weight'] += $weight;
        } else {
            $this->harvest[$treeProto->getSpaces()->getName()]['weight'] = $weight;
        }
    }

    public function getTrees() {
        return $this->trees;
    }

    public function getHarvest() {
        return $this->harvest;
    }

    public function save() {
        $data[] = $this->trees;
        $data[] = $this->harvest;
        $json = json_encode($data);
        file_put_contents('garden.txt', $json); 
    }
}
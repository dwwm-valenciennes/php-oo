<?php

namespace Rpg\Inventory;

class Item {
    public $name;

    public function __construct($name)
    {
        $this->name = $name;
    }
}

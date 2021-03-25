<?php

namespace Rpg\Character;

class Character {
    public $name;
    public $health = 100;
    public $strength = 10;
    public $mana = 10;
    public $inventory = [];
    public $level = 1;
    public $experience = 0;
    public $killed = false;

    public function __construct($name) {
        $this->name = $name;
    }

    /**
     * Attaque un autre personnage.
     */
    public function attack($character) {
        $character->health -= $this->strength * 2;
    }
}

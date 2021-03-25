<?php

namespace Rpg\Character;

class Magus extends Character {
    public function __construct($name) {
        parent::__construct($name);
        $this->mana *= 2;
    }

    /**
     * Lance un sort.
     */
    public function castSpell($character) {
        $character->health -= $this->mana * 3;
    }
}

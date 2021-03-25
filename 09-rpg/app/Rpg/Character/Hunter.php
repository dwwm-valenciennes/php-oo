<?php

namespace Rpg\Character;

class Hunter extends Character {
    /**
     * Attaque à distance.
     */
    public function rangedAttack($character) {
        $character->health -= $this->strength * 3;
    }
}

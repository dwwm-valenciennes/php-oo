<?php

class Woman {
    public $civility;
    public $name;
    public $firstname;
    public $birthday;
    public $partner;
    public $childs = [];
    public $pregnant = false;

    public function __construct($firstname, $name, $birthday) {
        $this->firstname = $firstname;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->civility = 'Mme';
    }

    /**
     * Répare quelque chose.
     */
    public function repair() {
        // @todo Si la personne a un partenaire, elle répare la voiture du partenaire
        // Si elle n'en a pas, c'est sa propre voiture
        return $this->firstname.' répare la voiture de ???';
    }

    /**
     * Peut respirer.
     */
    public function breathe() {
        return $this->firstname.' respire';
    }

    /**
     * Peut manger.
     */
    public function eat() {
        // On peut appeller une méthode dans une méthode
        return $this->breathe().' et mange';
    }
}

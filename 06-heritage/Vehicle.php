<?php

class Vehicle {
    public $brand;
    public $price;
    protected $wheels;
    private $registration;
    public static $registrations = [];

    private $started = false;
    private $currentSpeed = 0;
    protected $maxSpeed = 5;

    public function __construct($brand, $price) {
        $this->brand = $brand;
        $this->price = $price;
        $this->generateRegistration();
    }

    /**
     * Génère une plaque d'immatriculation unique
     */
    private function generateRegistration() {
        $letters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $numbers = '0123456789';

        $registration = '';
        // Une chaine est aussi un tableau
        $registration .= $letters[rand(0, 25)].$letters[rand(0, 25)]; // GE
        $registration .= '-'.$numbers[rand(0, 9)].$numbers[rand(0, 9)].$numbers[rand(0, 9)].'-'; // -263-
        $registration .= $letters[rand(0, 25)].$letters[rand(0, 25)]; // RF

        if (in_array($registration, self::$registrations)) {
            // Appel récursif de ma fonction pour avoir une immatriculation unique
            return $this->generateRegistration();
        }

        self::$registrations[] = $registration;
        $this->registration = $registration;
    }

    /**
     * Démarre le véhicule
     */
    public function start() {
        $this->started = true;
    }

    /**
    * Augmente la vitesse actuelle de 10 km/h
    */
    public function accelerate() {
        if ($this->started && $this->currentSpeed <= $this->maxSpeed) {
            $this->currentSpeed += 10;
        }

        // On bloque la vitesse actuelle à la vitesse max si cela dépasse
        if ($this->currentSpeed > $this->maxSpeed) {
            $this->currentSpeed = $this->maxSpeed;
        }

        return $this;
    }
}

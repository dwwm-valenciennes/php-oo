<?php

class Moto extends Vehicle {
	public function __construct($brand, $price) {
        parent::__construct($brand, $price);

        $this->wheels = 2;
        $this->maxSpeed = 250;
    }
}

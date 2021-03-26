<?php

namespace App;

class Validation {
    private $form;
    private $field;
    public $errors = [];

    public function __construct(Form $form) {
        $this->form = $form;
    }

    /**
     * Définir un champ "temporaire".
     */
    public function add($name) {
        $this->field = $name;

        return $this;
    }

    /**
     * Rend obligatoire le champ.
     */
    public function required() {
        // On s'assure que les données dans le champ sont bien VIDE ('') et non null.
        if ($this->form->get($this->field) === '') {
            $this->errors[$this->field] = 'Le champ '.$this->field.' est requis';
        }

        return $this;
    }

    /**
     * Vérifie qu'un email est valide (mais pas forcément obligatoire)
     */
    public function email() {
        if (empty($this->form->get($this->field))) {
            // return arrête le code et $this permet de chainer les méthodes
            return $this;
        }

        // revient à faire !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)
        if (!filter_var($this->form->get($this->field), FILTER_VALIDATE_EMAIL)) {
            $this->errors[$this->field] = 'Le champ '.$this->field.' est invalide';
        }

        return $this;
    }
}

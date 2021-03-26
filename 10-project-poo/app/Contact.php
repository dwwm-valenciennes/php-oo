<?php

namespace App;

class Contact {
    public $id;
    public $civility;
    public $email;
    public $phone;
    public $message;

    /**
     * Enregistre un contact dans la BDD.
     */
    public function save() {
        // Ici on doit faire un INSERT...
        DB::postQuery(
            'INSERT INTO contact (civility, email, phone, message)
             VALUES (:civility, :email, :phone, :message)',
            [
                'civility' => $this->civility,
                'email' => $this->email,
                'phone' => $this->phone,
                'message' => $this->message,
            ]
        );
    }
}

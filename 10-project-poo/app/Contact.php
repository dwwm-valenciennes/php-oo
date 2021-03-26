<?php

namespace App;

class Contact {
    public $id;
    public $fields = [];
    /*public $civility;
    public $email;
    public $phone;
    public $message;*/

    /**
     * La méthode magique __set() permet de dire :
     * Quand j'écris $contact->email = 'toto@gmail.com'
     * email est $property et toto@gmail.com est $value
     */
    public function __set($property, $value) {
        // dump($property, $value);
        // $this->fields['civility'] = 'Mr';
        $this->fields[$property] = $value;
    }

    /**
     * Enregistre un contact dans la BDD.
     */
    public function save() {
        // App\Contact -> App/Contact
        $table = str_replace('\\', '/', get_class($this));
        // App/Contact -> Contact -> contact
        $table = strtolower(basename($table)); // /home/matthieu/Fiorella -> fiorella
        // Ici on doit faire un INSERT...
        $sql = "INSERT INTO $table (civility, email, phone, message)
                VALUES (:civility, :email, :phone, :message)";
        // dd est un dump et un die
        // dd($sql);

        DB::postQuery($sql, $this->fields);
    }
}

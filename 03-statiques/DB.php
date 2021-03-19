<?php

class DB {
    /**
     * Permet de lancer une requête SQL
     * et retourne les résultats.
     */
    public static function query($sql, $bindings = []) {
        $db = new PDO('mysql:host=localhost;dbname=webflix;charset=UTF8', 'root', '', [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        ]);

        $query = $db->prepare($sql);
        $query->execute($bindings);

        return $query->fetchAll();
    }
}

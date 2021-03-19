<?php

// Création d'une classe avec méthodes statiques
// Nous allons créer une classe DB qui va nous aider à écrire nos requêtes SQL
// plus facilement et plus rapidement.

// Actuellement
$db = new PDO('mysql:host=localhost;dbname=webflix;charset=UTF8', 'root', '', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

// Si on veut faire un select
$query = $db->query('SELECT * FROM movie');
$movies = $query->fetchAll();
var_dump($movies);

// Si on veut faire un select préparé
$query = $db->prepare('SELECT * FROM movie WHERE id = :id');
$query->execute([':id' => 1]);
$movie = $query->fetch();
var_dump($movie);

// Avec les objets
$movies = DB::query('SELECT * FROM movie');
$movie = DB::query('SELECT * FROM movie WHERE id = :id', ['id' => 1]);
var_dump($movies);
var_dump($movie);

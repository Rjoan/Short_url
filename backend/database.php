<?php

try {

    $bdd = new PDO('mysql:host=localhost; dbname=udemy; charset=utf8', 'root', '');

} catch (PDOException $e) {

    die('Erreur à la connexion à la base de donnée '. $e->getMessage());

}
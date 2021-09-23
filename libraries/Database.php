<?php

class Database
{
    /**  retourne une connexion à la base de donné */
    public static function getPdo(): PDO
    {
    $pdo = new PDO('mysql:host=localhost;dbname=blogpoo;charset=utf8', 'root', 'root', [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC

    ]);
    return $pdo;
    } // retourne la liste des articles par dates de créations

}
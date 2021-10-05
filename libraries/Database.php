<?php
class Database
{
    /**
     * Retourne une instance de PDO

     */
    public static function getPdo(int $errorMode =  PDO::ERRMODE_EXCEPTION, int $fetchMode = PDO::FETCH_ASSOC): PDO
    {
        return new PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', 'root', [
            PDO::ATTR_ERRMODE => $errorMode,
            PDO::ATTR_DEFAULT_FETCH_MODE => $fetchMode
        ]);
    }
}
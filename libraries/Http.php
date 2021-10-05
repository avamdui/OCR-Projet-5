<?php
class Http
{
    /**
     * Redirige le visiteur vers $uri

     */
    public static function redirect(string $uri): void
    {
        header("Location: $uri");
        exit();
    }
}
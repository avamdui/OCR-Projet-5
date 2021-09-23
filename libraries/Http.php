<?php

class HTTP
{
   public static function redirect(string $url): void{ // void ne retournera rien
        header("Location: $url");
        exit();
    }
}
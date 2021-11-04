<?php
class Renderer
{
public static function render(string $path, $variables = []): void
    {
        extract($variables);
        ob_start();
        require('templates/' . $path . '.html.php');
        $pageContent = ob_get_clean();
        require('templates/home/layout.html.php');
    }
}
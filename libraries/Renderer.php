<?php
class Renderer
{
    /**
     * Affiche la vue demandée dans $path en injectant les variables contenues dans $variables

     */
    public static function render(string $path, array $variables = []): void
    {
        extract($variables);
        ob_start();
        require('templates/' . $path . '.html.php');
        $pageContent = ob_get_clean();
        require('templates/home/layout.html.php');
    }
}
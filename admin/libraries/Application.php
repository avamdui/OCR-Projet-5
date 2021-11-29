<?php

class Application
{
    const DEFAULT_CONTROLLER = "DashBoardController";
    const DEFAULT_TASK = "welcomArticles";
    
    public static function process()
    {
            $controllerName = self::getControllerName();
            $taskName = self::getTaskName();
            $controller = new $controllerName();
            $controller->$taskName();
    }

    private static function getTaskName(): string
    {
        $taskName = filter_input(INPUT_GET, "task", FILTER_SANITIZE_SPECIAL_CHARS);
        if (!$taskName) {
            $taskName = self::DEFAULT_TASK;
        }
        return $taskName;
    }


    private static function getControllerName(): string
    {
        $controllerName = filter_input(INPUT_GET, "controller", FILTER_SANITIZE_SPECIAL_CHARS);

        if (!$controllerName) {
            $controllerName = self::DEFAULT_CONTROLLER;
        }
        require_once("./libraries/controllers/$controllerName.php");
        return ucfirst($controllerName);
        
    }
}

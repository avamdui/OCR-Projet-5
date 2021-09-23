<?php
    class Application {
        
        public static function process() 
        {
            $controllerName = "Index";
            $task = "welcom";
            if(!empty($_GET['controller'])){
                $controllerName = $_GET['controller'];
            }
            if(!empty($_GET['task'])){
                $task = ucfirst($_GET['task']);
            }

            $controllerName = "\Controllers\\" .  $controllerName;
            $controller = new $controllerName;
            $controller->$task();
        }

    }
    
<?php
namespace Controllers;
date_default_timezone_set('Europe/Paris');
abstract class Controller
{
    protected $modelName;
    protected $model;
    public function __construct()
    {
        $realModelName = "\\Models\\" . $this->modelName;
        $this->model = new $realModelName();
    }
}
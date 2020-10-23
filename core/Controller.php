<?php

namespace core;

abstract class Controller
{

    public abstract function index();

    public function loadView($viewName, $viewData = array())
    {
        extract($viewData);                // Transforms array keys into variables
        require 'views/' . $viewName . '.php';
    }


    public function loadTemplate($viewName, $viewData = array())
    {
        extract($viewData);                // Transforms array keys into variables
        require 'views/template.php';
    }
}

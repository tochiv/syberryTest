<?php

namespace core;

use controllers\NotFoundController;

class Core
{
    public function run()
    {
        $params = array();

        $url = '/';
        if (isset($_GET['url'])) {
            $url .= $_GET['url'];
        }

        // Если url не пустой
        if ($url != '/') {

            // Делим url на две части по слешу. Первая отвечает за контроллер, вторая за метод контроллера
            $url = explode("/", $url);
            array_shift($url);

            // Gets controller
            $currentController = ucfirst($url[0]) . "Controller"; // Название контроллера с большой буквой
            array_shift($url);

            if (isset($url[0]) && !empty($url[0]) && $url[0] != '/') {
                $currentAction = $url[0];

                array_shift($url);
            } else {
                // Если второй параметр url не указан, то установить дефолтнный метод index
                $currentAction = 'index';
            }
        } else {

            // Дефолтный контроллер и метод контроллера
            $currentController = 'HomeController';
            $currentAction = 'index';
        }

        $controllerName = $currentController;
        // Добавить namespace к контроллеру
        $currentController = '\\controllers\\' . $currentController;

        if (!file_exists('./controllers/' . $controllerName . '.php') ||
            !method_exists($currentController, $currentAction)) {

            $c = new NotFoundController();
            $currentAction = 'index';
        } else {
            $c = new $currentController();
        }

        call_user_func_array(array($c, $currentAction), $params);    // $c->$currentAction($params);
    }
}
<?php

namespace controllers;

use core\Controller;
use models\HomeModel;

class HomeController extends Controller
{

    private HomeModel $model;

    public function __construct()
    {
        $this->model = new HomeModel();
    }

    public function get()
    {
        $this->model->getEmployee();
    }

    public function index()
    {
        // Keywords of home page
        $keywords = array('home', 'homePage');

        $params = array(
            'title' => 'syberryTest',
            'description' => "",
            'keywords' => $keywords,
            'robots' => 'noindex',
            'data' => $this->model->getEmployee()
        );


        $this->loadTemplate('home', $params);
    }

}

<?php

namespace controllers;

use core\Controller;


class NotFoundController extends Controller
{

    public function index()
    {
        // Keywords of home page
        $keywords = array('404', 'page-not-found');

        $params = array(
            'title' => '404 - Page not found',
            'description' => "",
            'keywords' => $keywords,
            'robots' => 'noindex'
        );

        $this->loadTemplate('404', $params);
    }
}

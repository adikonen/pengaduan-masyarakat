<?php

class App 
{
    public $controller = 'Home';
    public $method = 'index';
    public $params = [];

    public function __construct()
    {
        $url = $this->parseURL();
        $controller = $url[0] ?? $this->controller;

        if (file_exists("../app/controllers/{$controller}.php")) {
            $this->controller = $controller;
            unset($url[0]);
        }
        require "../app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        $method = $url[1] ?? $this->method;
        if (method_exists($this->controller, $method)) {
            $this->method = $method;
            unset($url[1]);
        }

        if (! empty($url)) {
            $this->params = array_values($url);
        }

        // var_dump($this->controller, $this->method);
        // die;
        call_user_func_array([$this->controller, $this->method], $this->params);
        
    }

    public function parseURL() : array
    {
        $hasRequest = isset($_GET['url']);
        if ($hasRequest) {
            $url = $_GET['url'];
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = rtrim($url, '/');
            $url = explode('/', $url);

            return $url;
        }

        return [];
    }
}
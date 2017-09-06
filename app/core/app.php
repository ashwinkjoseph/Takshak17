<?php

class App{   

    protected $controller = "home";
    protected $method = "index";
    protected $params = array();

    public function __construct(){

        require __DIR__.'/../../vendor/autoload.php';
        $dotenv = new Dotenv\Dotenv(__DIR__);
        $dotenv->load();

        $url = $this->parseUrl();

        if(isset($url[0])){

            if(file_exists(__DIR__."/../controllers/".$url[0].".php")){
                $this->controller = $url[0];
                unset($url[0]);
            }
            
        }

        
        require_once(__DIR__."/../controllers/".$this->controller.".php");

        $this->controller = new $this->controller;

        if(isset($url[1])){
            if(method_exists($this->controller, $url[1])){
                $this->method = $url[1];
                unset($url[1]);
            }
        }

        $this->params = array('get'=>($url ? array_values($url) : array()), 'post'=>($_POST ? $_POST : array()));

        call_user_func_array(array($this->controller, $this->method), $this->params);

    }

    protected function parseUrl(){

        if(isset($_GET['path'])){
            return $url = explode('/', filter_var(rtrim($_GET['path'], '/'), FILTER_SANITIZE_URL));
        }

    }

}
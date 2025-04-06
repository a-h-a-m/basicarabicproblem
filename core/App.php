<?php
    class App {
        protected $controller = 'HomeController';
        protected $method = 'index';
        protected $params = [];
        protected $controllers = [
            'home' => 'HomeController',
            'ujian' => 'UjianController',
            'file' => 'FileController'
        ];

        public function __construct() {
            $url = $this->parseUrl();
          
            if(isset($url[0]) && $url[0] == 'admin') {
                (new HomeController())->admin();
                return;
            }

            if(isset($this->controllers[$url[0]])) {
                $controller = $this->controllers[$url[0]];
                if(file_exists('controllers/' . $controller . '.php')) {
                    $this->controller = $controller;
                    unset($url[0]);
                }
            }

            //require_once 'controllers/' . $this->controller . '.php';
            $this->controller = new $this->controller;
            if(!isset($_SESSION['login']) && !isset($_GET['register']) && (!isset($_GET['login']) || trim($url[0]) != '')) {
                $this->controller->redirect('/?register');
            }

            if(isset($url[1])) {
                if(method_exists($this->controller, $url[1])) {
                    $this->method = $url[1];
                    unset($url[1]);
                }
            }

            call_user_func_array([$this->controller, $this->method], $this->params);
        }

        public function parseUrl() {
            if(isset($_GET['url'])) {
                return explode('/', $_GET['url']);
            }
        }
    }
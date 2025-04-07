<?php
    class Controller {
        protected $model = 'NamaModel';

        public function __construct() {
            $connection = Database::getConnection();
            $this->model = new $this->model($connection);
        }

        public function view($view, $model = []) {
            if(!empty($model)) {
                foreach($model as $key => $value)
                    $$key = $value;
            }
            ob_start();
            require_once 'views/' . $view . '.php';
            $html = ob_get_clean();

            $views = ['home/index (2)' => 1,
                'home/register' => 1,
                'home/register2' => 1,
                'home/index' => 1,
                'home/dashboard' => 2,
                'ujian/index' => 2,
                'ujian/admin' => 2,
                'ujian/ket' => 2,
                'ujian/petunjuk' => 2,
                'ujian/santri' => 2,
                'ujian/nilai' => 2,
                'ujian/close' => 2,
                'file/index' => 2,
                'admin/index' => 1,
            ];

            if(isset($views[$view]))
                require_once 'views/template' . $views[$view] . '.php';
        }

        public function redirect($url) {
            header('Location: ' . BASEURL . $url);
        }
    }
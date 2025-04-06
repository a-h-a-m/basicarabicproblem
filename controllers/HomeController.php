<?php
    class HomeController extends Controller {
        protected $model = 'UserModel';

        public function admin() {
            $this->view('admin/index');
        }
      
        public function index() {
          if(isset($_POST['password2'])) {
            if($_POST['password'] !== $_POST['password2']) {
                  $this->view('home/register2', [
                        'error' => 'Password yang dimasukkan harus sama!'
                    ]);
                    exit;
            }
            $data = $this->model->findSoundex('nama', addslashes($_POST['username']));
             $user = [
                     'nama' => $data[0]['nama'],
                     'no_wa' => $data[0]['no_wa'],
                     'password' => password_hash($_POST['password'], PASSWORD_BCRYPT),
                     'tahun' => '2025'
                 ];
                 $this->model->update($data[0]['id'], ...$user);
            unset($_POST['password2']);
            $_POST['username'] = $data[0]['nama'];
            $this->view('home/index', [
                        'success' => 'Berhasil! Silakan login dengan password yang baru dibuat'
                    ]);
                    exit;
                }
          //die;
            if($_SERVER['REQUEST_METHOD'] == 'POST' && !isset($_SESSION['login']) && isset($_GET['register'])) {
                $this->cekNama();
                return;
            }
            if(!isset($_SESSION['login']) && isset($_GET['register'])) {
                $this->view('home/register');
                return;
            }
            if(isset($_SESSION['login'])) {
                $this->view('home/dashboard');
                return;
            }
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                $this->login();
                return;
            }
            $this->view('home/index');
        }
      
        private function cekNama() {
            $user = addslashes($_POST['username']);
            $connection = Database::getConnection();
                    $log = new LogModel($connection);
            try {
                validasiLogin($user, $user);
                $data = $this->model->findSoundex('nama', $user);
                
                if(empty($data)) {
                  $array = [
                    'nama' => $user,
                    'status' => 'Gagal',
                    'timestamp' => date('Y-m-d H:i:s')
                    ];
                  
                    $log->save(...$array);  
                  $this->view('home/register', [
                        'error' => 'Nama tidak ditemukan / tidak terdaftar!'
                    ]);
                  
                    exit;
                }
              $array = [
                    'nama' => $user,
                    'status' => 'Berhasil',
                    'timestamp' => date('Y-m-d H:i:s')
                    ];
                  
                    $log->save(...$array);
              if(empty($data[0]['password'])) {
                $this->view('home/register2', [
                        'success' => 'Silakan buat Password baru untuk melanjutkan'
                    ]);
                    exit;
                } else {
                  $_POST['username'] = $data[0]['nama'];
                  $this->view('home/index (2)', [
                        'success' => 'Silakan masukkan password yang sudah dibuat'
                    ]);
                    exit;
              }
                
            }catch(Exception $e) {
                $this->view('home/register', [
                    'error' => "Nama lengkap tidak boleh kosong"
                ]);
            }
        }

        private function login() {
            //$user = getPhone($_POST['username']);
            $user = addslashes($_POST['username']);
            $pass = $_POST['password'];
            
            try {
                validasiLogin($user, $pass);
                //$data = $this->model->findByField('no_wa', $user);
                $data = $this->model->findByField('nama', $user);
                
                if(empty($data)) {
                    $this->view('home/index', [
                        'error' => 'Nama atau Password salah!'
                    ]);
                    exit;
                }
                validasiPassword($pass, $data[0]['password']);
                $_SESSION['login'] = $data[0]['id'];
                $_SESSION['nama'] = $data[0]['nama'];
                $_SESSION['wa'] = $data[0]['no_wa'];
                $this->redirect('/');
                // $user = [
                //     'nama' => $data['nama'],
                //     'no_wa' => $data['no_wa'],
                //     'password' => $data['password'],
                //     'tahun' => '2024'
                // ];
                // $this->model->update($data['id'], ...$user);
                // $user = [
                //     'nama' => 'Admin',
                //     'no_wa' => '085640332823',
                //     'password' => password_hash('admin', PASSWORD_BCRYPT),
                //     'tahun' => '2024'
                // ];
                // $this->model->save(...$user);
            }catch(Exception $e) {
                $this->view('home/index', [
                    'error' => $e->getMessage()
                ]);
            }
        }

        public function logout() {
            session_destroy();
            $this->redirect('/');
        }
    }
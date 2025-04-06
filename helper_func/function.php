<?php

spl_autoload_register('loadClass');

function loadClass($class) {
    if($class == 'Database')
        require_once 'config/database.php';

    $classes = [
        # core
        'App'           =>  'core/App.php',
        'Controller'    =>  'core/Controller.php',
        'Database'    =>  'core/Database.php',
        'Model'    =>  'core/Model.php',
        # controllers
        'FileController'=>  'controllers/FileController.php',
        'HomeController'=>  'controllers/HomeController.php',
        'SoalController'=>  'controllers/SoalController.php',
        'UjianController'=>  'controllers/UjianController.php',
        # models
        'UserModel'=>  'models/UserModel.php',
        'SoalModel'=>  'models/SoalModel.php',
        'UjianModel'=>  'models/UjianModel.php',
        'LogModel' =>  'models/LogModel.php'
        
    ];

    if(isset($classes[$class]))
        require_once $classes[$class];
}

function getPhone($no) {
    if(trim($no) == '')
        return '';
    $no = str_replace('+', '', $no);
    $no = str_replace('(', '', $no);
    $no = str_replace(')', '', $no);
    $no = str_replace('-', '', $no);
    $no = str_replace(' ', '', $no);
    $no = str_replace('.', '', $no);
    if($no[0] == 6 && $no[1] == 2)
        return '0' . substr($no, 2);
    if($no[0] != 0)
        return '0' . $no;
    return $no;
}

function validasiLogin($user, $pass) {
    if ($user == null || $pass == null ||
            trim($user) == "" || trim($pass) == "") {
            throw new Exception('Nama dan Password harus diisi!');
        }
}

function validasiPassword($password, $hash) {
    if(!password_verify($password, $hash))
        throw new Exception('Nama atau Password salah!');
}

function getTanggal($tanggal) {
    return $tanggal;
}

function cekAjax(){
    // Allow only AJAX requests
    if (!isset($_SERVER['HTTP_X_REQUESTED_WITH']) || $_SERVER['HTTP_X_REQUESTED_WITH'] !== 'XMLHttpRequest') {
        die;
    }
}
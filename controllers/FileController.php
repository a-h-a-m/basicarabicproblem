<?php

class FileController extends Controller
{
    protected $model = 'FileModel';
  
    public function __construct() {
    }

    public function download() {
        $this->view('file/index');
    }
}
<?php

class UjianController extends Controller
{
    protected $model = 'UjianModel';

    public function list() {
        $data = $this->model->findOuterLeft('soal', ['id', 'id_ujian'], 'GROUP BY soal.id_ujian ORDER BY ujian.id', '*, ujian.id AS id, COUNT(soal.id) AS jml_soal');
        $this->view('ujian/index', [
            'data' => $data
        ]);
    }

    public function edit() {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
            $this->add();
        $ujian = $this->model->findById($_GET['id']);
        $data = $this->model->getSoal($_GET['id']);
        $this->view('ujian/admin', [
            'data' => $data,
            'ujian' => $ujian
        ]);
    }

    protected function add() {
        $soal = addslashes($_POST['soal']);
        $a = addslashes($_POST['a']);
        $b = addslashes($_POST['b']);
        $c = addslashes($_POST['c']);
        $d = addslashes($_POST['d']);
        //$e = addslashes($_POST['e']);
        $kunci = $_POST['kunci'];
        $arraysoal = [
            'id_ujian' => $_GET['id'],
            'soal' => $soal,
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'd' => $d,
            'e' => '',
            'kunci' => $kunci
        ];
        $this->model->addSoal(...$arraysoal);
    }

    public function soal() {
        $ujian = $this->model->findById(1);
        $nilai = $this->model->getJawab($_SESSION['login'], 1);
        if($nilai)
            $status = $nilai[0]['status'];
        if(isset($status) && $status == 'selesai') {
            $this->nilai($ujian, 'error', 'Anda sudah selesai mengerjakan ujian!');
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['soal'] == 'mulai') {
            $_SESSION['soal'] = 'selesai';
            $this->model->setSelesai($_SESSION['login'], 1);
            $this->nilai($ujian, 'success', 'Anda sudah selesai mengerjakan ujian!');
            exit;
        }
        if(isset($_SESSION['soal']) && $_SESSION['soal'] == 'mulai') {
            $this->kerjakan($ujian);
            exit;
        }
        if(!isset($_SESSION['soal']))
            $this->view('ujian/ket', [
                'data' => $ujian
            ]);
        elseif($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['soal'] == 'petunjuk') {
            $_SESSION['soal'] = 'mulai';
            $this->kerjakan($ujian);
        }
        elseif($_SESSION['soal'] == 'petunjuk')
            $this->view('ujian/petunjuk');
    }

    public function ajax() {
        cekAjax();
        $this->model->saveJawaban($_GET['no'], $_GET['jwb']);
    }

    protected function kerjakan($ujian) {
        $soal = $this->model->getSoal(1);
        $jawab = $this->model->getJawab($_SESSION['login'], 1);
        $this->view('ujian/santri', [
            'data' => $ujian,
            'soal' => $soal,
            'jawab' => $jawab
        ]);
    }

    protected function nilai($ujian, $key = '', $value = '') {
        $soal = $this->model->getSoal(1);
        $nilai = $this->model->getJawab($_SESSION['login'], 1);
        $data = [
            'data' => $ujian,
            'soal' => $soal,
            'nilai' => $nilai
        ];
        if($key != '')
            $data[$key] = $value;
        $this->view('ujian/nilai', $data);
    }
}
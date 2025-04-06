<?php

class UjianController extends Controller
{
    protected $model = 'UjianModel';

    public function close() {
        $this->view('ujian/close');
    }
  
    public function list() {
        $data = $this->model->findOuterLeft('soal', ['id', 'id_ujian'], 'GROUP BY ujian.id ORDER BY ujian.id', '*, ujian.id AS id, COUNT(soal.id) AS jml_soal');
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

    public function update() {
        $id = $_POST['id'];
        $soal = addslashes($_POST['soal']);
        $a = addslashes($_POST['a']);
        $b = addslashes($_POST['b']);
        $c = addslashes($_POST['c']);
        $d = addslashes($_POST['d']);
        $e = addslashes($_POST['e']);
        $kunci = $_POST['kunci'];
        $arraysoal = [
            'soal' => $soal,
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'd' => $d,
            'e' => $e,
            'kunci' => $kunci
        ];
        $soalController = new SoalController();
        $soalController->model->update($id, ...$arraysoal);
        header('Location: /ujian/edit?id=' . $_GET['id']);
    }

    protected function add() {
        $soal = addslashes($_POST['soal']);
        $a = addslashes($_POST['a']);
        $b = addslashes($_POST['b']);
        $c = addslashes($_POST['c']);
        $d = addslashes($_POST['d']);
        $e = addslashes($_POST['e']);
        $kunci = $_POST['kunci'];
        $arraysoal = [
            'id_ujian' => $_GET['id'],
            'soal' => $soal,
            'a' => $a,
            'b' => $b,
            'c' => $c,
            'd' => $d,
            'e' => $e,
            'kunci' => $kunci
        ];
        $this->model->addSoal(...$arraysoal);
    }

    public function soal() {
      
        $id = $_GET['id'];
        $c = count($this->model->getSoal($id));
        if(!isset($_GET['c']))
           $this->redirect("/ujian/soal?id={$id}&c={$c}");
        
        $ujian = $this->model->findById($id);
        $nilai = $this->model->getJawab($_SESSION['login'], $id);
        
        if($nilai)
            $status = $nilai[0]['status'];
       
        if(isset($status) && $status == 'selesai') {
            $this->nilai($ujian, 'error', 'Anda sudah selesai mengerjakan ujian!');
            exit;
        }
        if($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['soal'] == 'mulai') {
            $_SESSION['soal'] = 'selesai';
            $this->model->setSelesai($_SESSION['login'], $id);
            if($_POST['habis']==1){
              $this->nilai($ujian, 'success', 'Waktu sudah habis!');
              exit;
            }
            $this->nilai($ujian, 'success', 'Anda sudah selesai mengerjakan ujian!');
            exit;
        }
        if(isset($_SESSION['soal']) && $_SESSION['soal'] == 'mulai') {
            $this->kerjakan($ujian);
            exit;
        }
        if(!isset($_SESSION['soal'])){
            $this->view('ujian/ket', [
                'data' => $ujian
            ]);
        }
        elseif($_SERVER['REQUEST_METHOD'] == 'POST' && $_SESSION['soal'] == 'petunjuk') {
            $_SESSION['soal'] = 'mulai';
            $this->kerjakan($ujian);
        }
        elseif($_SESSION['soal'] == 'petunjuk')
            $this->view('ujian/petunjuk');
    }

    public function del() {
        $soalController = new SoalController();
        $soalController->model->deleteById($_GET['soal']);
        header('Location: /ujian/edit?id=' . $_GET['id']);
    }

    public function ajax() {
        cekAjax();
        if(isset($_GET['t']))
            $this->model->saveWaktu($_GET['t']);
        else
            $this->model->saveJawaban($_GET['no'], $_GET['jwb']);
    }

    protected function kerjakan($ujian) {
        $id = $_GET['id'];
        $soal = $this->model->getSoal($id);
        $jawab = $this->model->getJawab($_SESSION['login'], $id);
        $this->view('ujian/santri', [
            'data' => $ujian,
            'soal' => $soal,
            'jawab' => $jawab
        ]);
    }

    protected function nilai($ujian, $key = '', $value = '') {
        
        unset($_SESSION['soal']);
        $id = $_GET['id'];
        $soal = $this->model->getSoal($id);
        $nilai = $this->model->getJawab($_SESSION['login'], $id);
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
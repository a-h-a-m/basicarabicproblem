<?php

class UjianModel extends Model
{
    //protected string $model = 'NamaModel';
    //protected array $modelDb = [];
    protected string $tableName = 'ujian';
    protected array $fieldNames = ['mapel', 'tanggal', 'waktu', 'jumlah_soal'];
    protected string $primaryKey = 'id';

    // tambah soal
    public function addSoal(...$data){
        $prepareConcat = join(',', array_fill(0, count($data), '?'));

        $sql = "INSERT INTO soal (id_ujian, soal, a, b, c, d, e, kunci)
                VALUES ({$prepareConcat})";
        
        $data = array_values($data);

        $statement = $this->connection->prepare($sql);
        $statement->execute($data);
        $no = $_POST['no'];
        $audioName = __DIR__ . "/../assets/audio/audio{$no}.mp3";
        move_uploaded_file($_FILES['audio']['tmp_name'], $audioName);
        //var_dump(is_dir(__DIR__ . '/../assets/audio'));
        //var_dump(move_uploaded_file($_FILES['audio']['tmp_name'], $audioName));die;
        //return $data;
    }

    // read soal
    public function getSoal(int $value){
        $sql = "SELECT *
                FROM soal
                WHERE id_ujian = ?
                ORDER BY id
                ASC";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$value]);
        $allData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $allData;
    }

    // read jawaban
    public function getJawab(int $idUser, int $idUjian){
        $sql = "SELECT *
                FROM nilai
                WHERE id_user = ? AND id_ujian = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$idUser, $idUjian]);
        $allData = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $allData;
    }

    public function saveJawaban($no, $jwb) {
        $id = $_GET['id'];
        $jawab = $this->getJawab($_SESSION['login'], $id);
        $arrayJwb = explode(',', $jawab[0]['jawaban']);
        $arrayJwb[$no] = $jwb;
        $stringJwb = join(',', $arrayJwb);
        $this->updateJwb($_SESSION['login'], $id, $stringJwb);
    }
  
    public function saveWaktu($t) {
        $id = $_GET['id'];
        $idUser = $_SESSION['login'];
        $idUjian = $id;
        $sql = "UPDATE nilai
                SET waktu = '{$t}'
                WHERE id_user = {$idUser} AND id_ujian = {$idUjian}";
        
        $statement = $this->connection->query($sql);
        
    }

    public function setSelesai($idUser, $idUjian) {
        $id = $_GET['id'];
        $soal = $this->getSoal($id);
        $jwb = $this->getJawab($_SESSION['login'], $id);
        $arrayJwb = explode(',', $jwb[0]['jawaban']);
        $totalBenar = 0;
        $jmlSoal = $_POST['count'];
        foreach($soal as $i => $j) {
            if($j['kunci'] == $arrayJwb[$i])
                $totalBenar++;
        }
        //$totalNilai = $totalBenar / $jmlSoal * 100;
        $totalNilai = "{$totalBenar}/{$jmlSoal}";
        $sql = "UPDATE nilai
                SET status = 'selesai', nilai = '{$totalNilai}'
                WHERE id_user = {$idUser} AND id_ujian = {$idUjian}";
        
        $statement = $this->connection->query($sql);
    }

    protected function updateJwb($idUser, $idUjian, $jwb){
        $sql = "UPDATE nilai
                SET jawaban = '{$jwb}'
                WHERE id_user = {$idUser} AND id_ujian = {$idUjian}";
        
        $statement = $this->connection->query($sql);
        //return $data;
    }
}
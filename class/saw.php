<?php

/**
 * Created by PhpStorm.
 * User: dimas
 * Date: 23/06/2018
 * Time: 10:50
 */
class saw {

    private $konek;
    private $idCookie;
    public $simpanNormalisasi=array();
    public function setconfig($konek,$idCookie){
        $this->konek=$konek;
        $this->idCookie=$idCookie;
    }
    public function getConnect(){
       return $this->konek;
    }
    //mendapatkan kriteria
    public function getKriteria(){
        $data=array();
        $querykriteria="SELECT namaKriteria FROM kriteria";//query tabel kriteria
        $execute=$this->getConnect()->query($querykriteria);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row['namaKriteria']);
        }
        return $data;
    }
    //mendapatkan alternative
    public function getAlternative(){
        $data=array();
        $queryAlternative="SELECT peserta.nama_peserta AS nama_peserta,id_peserta FROM nilai_peserta INNER JOIN peserta USING(id_peserta) WHERE id_jenistema='$this->idCookie' GROUP BY id_peserta ";
        $execute=$this->getConnect()->query($queryAlternative);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,array("nama_peserta"=>$row['nama_peserta'],"id_peserta"=>$row['id_peserta']));
        }
        return $data;
    }
    public function getNilaiMatriks($id_supplier){
        $data=array();
        $queryGetNilai="SELECT nilai_kriteria.nilai AS nilai,kriteria.sifat AS sifat,nilai_peserta.id_kriteria AS id_kriteria FROM nilai_peserta JOIN kriteria ON kriteria.id_kriteria=nilai_peserta.id_kriteria JOIN nilai_kriteria ON nilai_kriteria.id_nilaikriteria=nilai_peserta.id_nilaikriteria WHERE (id_jenistema='$this->idCookie' AND id_peserta='$id_supplier')";
        $execute=$this->getConnect()->query($queryGetNilai);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,array(
                "nilai"=>$row['nilai'],
                "sifat"=>$row['sifat'],
                "id_kriteria"=>$row['id_kriteria']
            ));
        }
        return $data;
    }
    public function getArrayNilai($id_kriteria){
        $data=array();
        $queryGetArrayNilai="SELECT nilai_kriteria.nilai AS nilai FROM nilai_peserta INNER JOIN nilai_kriteria ON nilai_peserta.id_nilaikriteria=nilai_kriteria.id_nilaikriteria WHERE nilai_peserta.id_kriteria='$id_kriteria' AND nilai_peserta.id_jenistema='$this->idCookie'";
        $execute=$this->getConnect()->query($queryGetArrayNilai);
        while ($row=$execute->fetch_array(MYSQLI_ASSOC)) {
            array_push($data,$row['nilai']);
        }
        return $data;
    }
    //rumus normalisasai
    public function normalisasi($array,$sifat,$nilai){
        if ($sifat=='Benefit'){
            $result=$nilai/max($array);
        }elseif ($sifat=='Cost'){
            $result=min($array)/$nilai;
        }
        return round($result,3);
    }
    //mendapatkan bobot kriteria
    public function getBobot($id_kriteria){
        $queryBobot="SELECT bobot FROM bobot_kriteria WHERE id_jenistema='$this->idCookie' AND id_kriteria='$id_kriteria' ";
        $row=$this->getConnect()->query($queryBobot)->fetch_array(MYSQLI_ASSOC);
        return $row['bobot'];
    }
    //meyimpan hasil perhitungan
    public function simpanHasil($id_supplier,$hasil){
        $queryCek="SELECT hasil FROM hasil WHERE id_peserta='$id_supplier' AND id_jenistema='$this->idCookie'";
        $execute=$this->getConnect()->query($queryCek);
        if ($execute->num_rows > 0) {
            $querySimpan="UPDATE hasil SET hasil='$hasil' WHERE id_peserta='$id_supplier' AND id_jenistema='$this->idCookie'";
        }else{
            $querySimpan="INSERT INTO hasil(hasil,id_peserta,id_jenistema) VALUES ('$hasil','$id_supplier','$this->idCookie')";
        }
        $execute=$this->getConnect()->query($querySimpan);

    }
    //Kmencari kesimpulan
    public function getHasil(){
    $queryHasil     =   "SELECT hasil.hasil AS hasil,jenis_tema.nama_tema,peserta.nama_peserta AS nama_peserta FROM hasil JOIN jenis_tema ON jenis_tema.id_jenistema=hasil.id_jenistema JOIN peserta ON peserta.id_peserta=hasil.id_peserta WHERE hasil.hasil=(SELECT MAX(hasil) FROM hasil WHERE id_jenistema='$this->idCookie')";
    $execute        =   $this->getConnect()->query($queryHasil)->fetch_array(MYSQLI_ASSOC);
    echo "<p>Jadi rekomendasi pemilihan peserta <i>$execute[nama_tema]</i> jatuh pada <i>$execute[nama_peserta]</i> dengan Nilai <b>".round($execute['hasil'],3)."</b></p>";
    }

}
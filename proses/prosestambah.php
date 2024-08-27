<?php
require '../connect.php';
require '../class/crud.php';
$crud = new crud($konek);

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = @$_GET['id'];
    $op = @$_GET['op'];
} else if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = @$_POST['id'];
    $op = @$_POST['op'];
}
$tema = @$_POST['tema'];
$peserta = @$_POST['peserta'];
$kriteria = @$_POST['kriteria'];
$sifat = @$_POST['sifat'];
$nilai = @$_POST['nilai'];
$keterangan = @$_POST['keterangan'];
$bobot = @$_POST['bobot'];
switch ($op) {
    case 'tema': //tambah data tema
        $query = "INSERT INTO jenis_tema (nama_tema) VALUES ('$tema')";
        $crud->addData($query, $konek);
        break;
    case 'peserta': // tambah data peserta
        $nama = @$_POST['peserta'];
        $alamat = @$_POST['alamat'];
        $usia = @$_POST['usia'];
        $hp = @$_POST['hp'];
        $kelamin = @$_POST['kelamin'];  // This line remains the same
        $email = @$_POST['email'];

        $query = "INSERT INTO peserta (nama_peserta, jenis_kelamin, alamat_peserta, usia_peserta, hp_peserta, email) 
                      VALUES ('$nama', '$kelamin', '$alamat', '$usia', '$hp', '$email')";
        $crud->addData($query, $konek);
        break;
    case 'kriteria': //tambah data kriteria
        $cek = "SELECT namaKriteria FROM kriteria WHERE namaKriteria='$kriteria'";
        $query = null;
        $query = "INSERT INTO kriteria (namaKriteria,sifat) VALUES ('$kriteria','$sifat')";
        $crud->multiAddData($cek, $query, $konek);
        break;
    case 'subkriteria': //tambah data sub kriteria
        $cek = "SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
        $query = null;
        $query .= "INSERT INTO nilai_kriteria (id_kriteria,nilai,keterangan) VALUES ('$kriteria','$nilai','$keterangan');";
        $crud->multiAddData($cek, $query, $konek);
        break;
    case 'bobot': //tambah data bobot
        $cek = "SELECT id_bobotkriteria FROM bobot_kriteria WHERE id_jenistema='$tema'";
        $query = null;
        for ($i = 0; $i < count($kriteria); $i++) {
            $query .= "INSERT INTO bobot_kriteria (id_jenistema,id_kriteria,bobot) VALUES ('$tema','$kriteria[$i]','$bobot[$i]');";
        }
        $crud->multiAddData($cek, $query, $konek);
        break;
    case 'nilai': //tambah data nilai
        $cek = "SELECT id_peserta FROM nilai_peserta WHERE id_peserta='$peserta'";
        $query = null;
        for ($i = 0; $i < count($nilai); $i++) {
            $query .= "INSERT INTO nilai_peserta (id_peserta,id_jenistema,id_kriteria,id_nilaikriteria) VALUES ('$peserta','$tema','$kriteria[$i]','$nilai[$i]');";
        }
        $crud->multiAddData($cek, $query, $konek);
        break;
}

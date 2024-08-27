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
$nama = @$_POST['peserta'];
$alamat = @$_POST['alamat'];
$usia = @$_POST['usia'];
$hp = @$_POST['hp'];
$kelamin = @$_POST['kelamin'];
$email = @$_POST['email'];
switch ($op) {
    case 'tema':
        $query = "UPDATE jenis_tema SET nama_tema='$tema' WHERE id_jenistema='$id'";
        $crud->update($query, $konek, './?page=tema');
        break;
    case 'peserta':
        $query = "UPDATE peserta 
                      SET nama_peserta='$nama', 
                          jenis_kelamin='$kelamin', 
                          alamat_peserta='$alamat', 
                          usia_peserta='$usia', 
                          hp_peserta='$hp',
                          email='$email' 
                      WHERE id_peserta='$id'";
        $crud->update($query, $konek, './?page=peserta');
        break;

    case 'kriteria':
        $cek = "SELECT namaKriteria FROM kriteria WHERE namaKriteria='$kriteria'";
        $query = "UPDATE kriteria SET namaKriteria='$kriteria',sifat='$sifat' WHERE id_kriteria='$id';";
        $crud->multiUpdate($cek, $query, $konek, './?page=kriteria');
        break;
    case 'subkriteria':
        $cek = "SELECT id_nilaikriteria FROM nilai_kriteria WHERE (id_kriteria='$kriteria' AND nilai ='$nilai') OR (id_kriteria='$kriteria' AND keterangan = '$keterangan')";
        $query = "UPDATE nilai_kriteria SET id_kriteria='$kriteria',nilai='$nilai',keterangan='$keterangan' WHERE id_nilaikriteria='$id'";
        $crud->multiUpdate($cek, $query, $konek, './?page=subkriteria');
        break;
    case 'bobot':
        $query = null;
        for ($i = 0; $i < count($id); $i++) {
            $query .= "UPDATE bobot_kriteria SET bobot='$bobot[$i]' WHERE id_bobotkriteria='$id[$i]';";
        }
        $crud->update($query, $konek, './?page=bobot');
        break;
    case 'nilai':
        if ($_POST['action'] == 'update') { // Pastikan ada parameter action yang menunjukkan pembaruan
            $nilai = @$_POST['nilai'];
            $id = $_POST['id']; // Pastikan variabel ini diambil dari form

            $query = null;
            for ($i = 0; $i < count($id); $i++) {
                $query .= "UPDATE nilai_peserta SET id_nilaikriteria='$nilai[$i]' WHERE id_nilaipeserta='$id[$i]';";
            }
            $crud->update($query, $konek, './?page=penilaian');
        }
        break;
}

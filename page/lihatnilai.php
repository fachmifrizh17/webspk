<?php
$a=htmlspecialchars(@$_GET['a']);
$b=htmlspecialchars(@$_GET['b']);
$querylihat="SELECT id_nilaipeserta,kriteria.namaKriteria AS namaKriteria,nilai_kriteria.keterangan AS keterangan FROM nilai_peserta
INNER JOIN kriteria USING (id_kriteria)
INNER JOIN nilai_kriteria USING (id_nilaikriteria)
WHERE nilai_peserta.id_peserta='$a' AND nilai_peserta.id_jenistema='$b'";
$execute2=$konek->query($querylihat);
if ($execute2->num_rows == 0){
    header('location:./?page=penilaian');
}
?>
<!-- judul -->
<div class="panel-top">
    <b class="text-green">Detail data</b>
</div>
<form>
    <div class="panel-middle">
        <div class="group-input">
            <?php
            $query="SELECT nama_peserta FROM peserta WHERE id_peserta='$a'";
            $execute=$konek->query($query);
            $data=$execute->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="group-input">
                <label for="jenisbarang">Nama Peserta</label>
                <input class="form-custom" value="<?php echo $data['nama_peserta'];?>" disabled type="text" autocomplete="off" required name="Peserta" id="jenisbarang">
            </div>
        </div>
        <div class="group-input">
            <?php
            $query="SELECT nama_tema FROM jenis_tema WHERE id_jenistema='$b'";
            $execute=$konek->query($query);
            $data=$execute->fetch_array(MYSQLI_ASSOC);
            ?>
            <div class="group-input">
                <label for="jenisbarang">Jenis Tema</label>
                <input class="form-custom" value="<?php echo $data['nama_tema'];?>" disabled type="text" autocomplete="off" required name="jenisbarang" id="jenisbarang" placeholder="Jenis Tema">
            </div>
        </div>
        <?php
        $execute2=$konek->query($querylihat);
        while($data2=$execute2->fetch_array(MYSQLI_ASSOC)){
            echo "<div class=\"group-input\">
                        <label for=\"\">$data2[namaKriteria]</label>
                        <input class=\"form-custom\" value=\"$data2[keterangan]\" disabled type=\"text\" autocomplete=\"off\" required name=\"bobot[]\">
                      </div>
                ";
        }
        ?>
    </div>
    <div class="panel-bottom">
        <button type="submit" class="btn btn-green">Simpan</button>
        <button type="reset" class="btn btn-second">Reset</button>
    </div>
</form>
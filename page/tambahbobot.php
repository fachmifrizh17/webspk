
<!-- judul -->
<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" action="./proses/prosestambah.php" method="POST">
    <input type="hidden" value="bobot" name="op">
    <div class="panel-middle">
        <div class="group-input">
            <label for="tema">Jenis Bobot Tema</label>
            <select class="form-custom" required name="tema" id="tema">
                <option selected disabled>--Pilih Jenis Bobot Tema--</option>
                <?php
                $query="SELECT * FROM jenis_tema";
                $execute=$konek->query($query);
                if ($execute->num_rows > 0){
                    while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                        echo "<option value=\"$data[id_jenistema]\">$data[nama_tema]</option>";
                    }
                }else {
                    echo "<option value=\"\">Belum ada Jenis Tema</option>";
                }
                ?>
            </select>
        </div>
        <?php
        $query="SELECT * FROM kriteria";
        $execute=$konek->query($query);
        if ($execute->num_rows > 0){
            while($data=$execute->fetch_array(MYSQLI_ASSOC)){
                echo "<div class=\"group-input\">
                        <label for=\"$data[namaKriteria]\">$data[namaKriteria]</label>
                        <input type='hidden' value=$data[id_kriteria] name='kriteria[]'>
                            <input class=\"form-custom\" type=\"text\" autocomplete=\"off\" required name=\"bobot[]\" id=\"$data[namaKriteria]\" placeholder=\"Nilai $data[namaKriteria]\">
                      </div>
                ";
            }
        }
        ?>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>
<script>
    document.getElementById("form").addEventListener("submit", function(event) {
        var tema = document.getElementById("tema").value;
        var kriteria = document.getElementById("kriteria").value;
        if (kriteria === "") {
            alert("Kriteria kriteria harus dipilih");
            event.preventDefault();
            return false;
        }

        if (tema === "") {
            alert("Tema kriteria harus diisi");
            event.preventDefault();
            return false;
        }
    });
</script>
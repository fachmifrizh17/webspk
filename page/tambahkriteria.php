<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="kriteria">
    <div class="panel-middle">
        <div class="group-input">
            <label for="kriteria">Nama kriteria :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nama kriteria" id="kriteria" name="kriteria">
        </div>
        <div class="group-input">
            <label for="sifat">Sifat kriteria :</label>
            <select class="form-custom" required id="sifat" name="sifat">
                <option selected disabled value="">-- Pilih Sifat Kriteria --</option>
                <option value="Benefit">Benefit</option>
            </select>
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>

<script>
    document.getElementById("form").addEventListener("submit", function(event) {
        var kriteria = document.getElementById("kriteria").value;
        var sifat = document.getElementById("sifat").value;

        if (kriteria.trim() === "") {
            alert("Nama kriteria harus diisi");
            event.preventDefault();
            return false;
        }

        if (sifat === "") {
            alert("Sifat kriteria harus dipilih");
            event.preventDefault();
            return false;
        }
    });
</script>

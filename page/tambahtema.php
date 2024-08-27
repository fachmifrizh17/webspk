<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="tema">
    <div class="panel-middle">
        <div class="group-input">
            <label for="tema">Nama Tema Foto :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nama Tema Foto" id="tema" name="tema">
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>

<script>
    document.getElementById('buttonreset').addEventListener('click', function() {
        $('#tema').val("");
    });
</script>

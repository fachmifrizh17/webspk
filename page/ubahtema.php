<?php
$id = htmlspecialchars(@$_GET['id']);
$query = "SELECT id_jenistema,nama_tema FROM jenis_tema WHERE id_jenistema='$id'";
$execute = $konek->query($query);
if ($execute->num_rows > 0) {
    $data = $execute->fetch_array(MYSQLI_ASSOC);
} else {
    header('location:./?page=tema');
}
?>
<div class="panel-top panel-top-edit">
    <b><i class="fa fa-pencil-alt"></i> Ubah data</b>
</div>
<form id="form" method="POST" action="./proses/prosesubah.php">
    <input type="hidden" name="op" value="tema">
    <input type="hidden" name="id" value="<?php echo $data['id_jenistema']; ?>">
    <div class="panel-middle">
        <div class="group-input">
            <label for="tema">Nama Tema :</label>
            <input type="text" value="<?php echo $data['nama_tema']; ?>" class="form-custom" required autocomplete="off" placeholder="Nama Tema" id="tema" name="tema">
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
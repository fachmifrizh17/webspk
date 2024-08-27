<?php
$id = htmlspecialchars(@$_GET['id']);
$query = "SELECT * FROM peserta WHERE id_peserta='$id'";
$execute = $konek->query($query);
if ($execute->num_rows > 0) {
    $data = $execute->fetch_array(MYSQLI_ASSOC);
} else {
    header('location:./?page=peserta');
}
?>
<div class="panel-top panel-top-edit">
    <b><i class="fa fa-pencil-alt"></i> Ubah data</b>
</div>
<form id="form" method="POST" action="./proses/prosesubah.php">
    <input type="hidden" name="op" value="peserta">
    <input type="hidden" name="id" value="<?php echo $data['id_peserta']; ?>">
    <div class="panel-middle">
        <div class="group-input">
            <label for="peserta">Nama peserta :</label>
            <input type="text" value="<?php echo $data['nama_peserta']; ?>" class="form-custom" required autocomplete="off" placeholder="Nama Peserta" id="peserta" name="peserta">
        </div>
    </div>
    <div class="panel-middle">
        <div class="group-input">
            <label for="kelamin">Jenis Kelamin Peserta:</label>
            <select class="form-custom" id="kelamin" name="kelamin" required>
                <option value="" disabled>Pilih Jenis Kelamin</option>
                <option value="Laki-laki" <?php echo ($data['jenis_kelamin'] === 'Laki-laki') ? 'selected' : ''; ?>>Laki-laki</option>
                <option value="Perempuan" <?php echo ($data['jenis_kelamin'] === 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
            </select>
        </div>
    </div>
    <div class="panel-middle">
        <div class="group-input">
            <label for="peserta">Alamat peserta :</label>
            <input type="text" value="<?php echo $data['alamat_peserta']; ?>" class="form-custom" required autocomplete="off" placeholder="Alamat Peserta" id="alamat" name="alamat">
        </div>
    </div>
    <div class="panel-middle">
        <div class="group-input">
            <label for="peserta">Usia peserta :</label>
            <input type="text" value="<?php echo $data['usia_peserta']; ?>" class="form-custom" required autocomplete="off" placeholder="usia Peserta" id="usia" name="usia">
        </div>
    </div>
    <div class="panel-middle">
        <div class="group-input">
            <label for="peserta">No HP peserta :</label>
            <input type="text" value="<?php echo $data['hp_peserta']; ?>" class="form-custom" required autocomplete="off" placeholder="No HP Peserta" id="hp" name="hp">
        </div>
    </div>
    <div class="panel-middle">
        <div class="group-input">
            <label for="peserta">Email peserta :</label>
            <input type="text" value="<?php echo $data['email']; ?>" class="form-custom" required autocomplete="off" placeholder="Email Peserta" id="email" name="email">
        </div>
    </div>
    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>
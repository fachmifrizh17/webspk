<div class="panel-top">
    <b class="text-green"><i class="fa fa-plus-circle text-green"></i> Tambah data</b>
</div>
<form id="form" method="POST" action="./proses/prosestambah.php">
    <input type="hidden" name="op" value="peserta">

    <div class="panel-middle">
        <div class="group-input">
            <label for="peserta">Nama Fotographer :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Nama Fotographer" id="peserta" name="peserta">
        </div>
    </div>

    <div class="panel-middle">
        <div class="group-input">
            <label for="kelamin">Jenis Kelamin Fotographer:</label>
            <select class="form-custom" id="kelamin" name="kelamin" required>
                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
            </select>
        </div>
    </div>


    <div class="panel-middle">
        <div class="group-input">
            <label for="alamat">Alamat Fotographer :</label>
            <input type="text" class="form-custom" required autocomplete="off" placeholder="Alamat Fotographer" id="alamat" name="alamat">
        </div>
    </div>

    <div class="panel-middle">
        <div class="group-input">
            <label for="usia">Usia Fotographer :</label>
            <input type="number" class="form-custom" required autocomplete="off" placeholder="Usia Fotographer" id="usia" name="usia">
        </div>
    </div>

    <div class="panel-middle">
        <div class="group-input">
            <label for="hp">No HP Fotographer :</label>
            <input type="number" class="form-custom" required autocomplete="off" placeholder="HP Fotographer" id="hp" name="hp">
        </div>
    </div>

    <div class="panel-middle">
        <div class="group-input">
            <label for="email">Email Fotographer :</label>
            <input type="email" class="form-custom" required autocomplete="off" placeholder="Email Fotographer" id="email" name="email">
        </div>
    </div>

    <div class="panel-bottom">
        <button type="submit" id="buttonsimpan" class="btn btn-green"><i class="fa fa-save"></i> Simpan</button>
        <button type="reset" id="buttonreset" class="btn btn-second">Reset</button>
    </div>
</form>
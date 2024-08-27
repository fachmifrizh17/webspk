<style>
    body {
        margin: 0;
        font-family: Arial, sans-serif;
        background: url('asset/image/backlogin.jpg') no-repeat center center fixed;
        background-size: cover;
    }

    .panel {
        background-color: rgba(255, 255, 255, 0.8);
        /* Transparent background */
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
        border-radius: 10px;
        margin: 20px;
    }
</style>
<!-- judul -->
<div class="panel">
    <div class="panel-middle" id="judul">
        <img src="asset/image/penilaian.svg">
        <div id="judul-text">
            <h2 class="text-green">PENILAIAN</h2>
            Halamanan Administrator Penilaian
        </div>
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi'])=='ubah'){
                include 'ubahnilai.php';
            }elseif (@htmlspecialchars($_GET['aksi'])=='lihat'){
                include 'lihatnilai.php';
            }else{
                include 'tambahnilai.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
            <div class="panel-top">
                <b style="float: left" class="text-green">Daftar Nilai</b>
                <a  class="btn btn-green" id="btn-dropdown" target="_blank" href="./cetaknilai.php"><i class="fa fa-print"></i> Cetak Pdf</a>
                <div style="float:right;width: 250px;">
                    <select class="form-custom" name="pilih" id="pilihNilai">
                        <option value="">Semua Jenis Tema</option>;
                        <?php
                        $query="SELECT*FROM jenis_tema";
                        $execute=$konek->query($query);
                        if ($execute->num_rows > 0){
                            while ($data=$execute->fetch_array(MYSQLI_ASSOC)){
                           if ($pilih==$data[id_jenistema]) {
                                $selected="selected";
                            }else{
                                $selected=null;
                            }
                                echo "<option $selected value=$data[id_jenistema]>$data[nama_tema]</option>";
                            }
                        }else{
                            echo '<option disabled value="">Tidak ada data</option>';
                        }
                        ?>
                    </select>
                </div>
                <div style="clear: both;"></div>
            </div>
            <div class="panel-middle" id="animation">
                <div class="table-responsive">
                    <table>
                        <thead><tr><th>No</th><th>Nama Tema</th><th>Nama Peserta</th><th>Aksi</th></tr></thead>
                        <tbody id="isiNilai"></tbody>
                    </table>
                </div>
            </div>
            <div class="panel-bottom"></div>
        </div>
    </div>
</div>
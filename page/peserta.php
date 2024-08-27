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
<div class="panel">
    <div class="panel-middle" id="judul">
        <img src="asset/image/people.svg">
        <div id="judul-text">
            <h2 class="text-green">Fotographer</h2>
            Halamanan Administrator Fotographer
        </div>
    </div>
</div>
<!-- judul -->
<div class="row">
    <div class="col-4">
        <div class="panel">
            <?php
            if (@htmlspecialchars($_GET['aksi']) == 'ubah') {
                include 'ubahpeserta.php';
            } else {
                include 'tambahpeserta.php';
            }
            ?>
        </div>
    </div>
    <div class="col-8">
        <div class="panel">
            <div class="panel-top">
                <b class="text-green">Daftar Fotographer</b>
                <a  class="btn btn-green" id="btn-dropdown" target="_blank" href="./cetakpeserta.php"><i class="fa fa-print"></i> Cetak Pdf</a>

            </div>
            <div class="panel-middle">
                <div class="table-responsive">
                    <table>
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Fotographer</th>
                                <th>Jenis Kelamin</th>
                                <th>Alamat Fotographer</th>
                                <th>Usia Fotographer</th>
                                <th>No HP Fotographer</th>
                                <th>Email Fotographer</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $query = "SELECT * FROM peserta";
                            $execute = $konek->query($query);
                            if ($execute->num_rows > 0) {
                                $no = 1;
                                while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                                    echo "
                            <tr id='data'>
                                <td>$no</td>
                                <td>$data[nama_peserta]</td>
                                <td>$data[jenis_kelamin]</td>
                                <td>$data[alamat_peserta]</td>
                                <td>$data[usia_peserta]</td>
                                <td>$data[hp_peserta]</td>
                                <td>$data[email]</td>
                                <td>
                                <div class='norebuttom'>
                                <a class=\"btn btn-light-green\" href='./?page=peserta&aksi=ubah&id=" . $data['id_peserta'] . "'><i class='fa fa-pencil-alt'></i></a>
                                <a class=\"btn btn-yellow\" data-a=" . $data['nama_peserta'] . " id='hapus' href='./proses/proseshapus.php/?op=peserta&id=" . $data['id_peserta'] . "'><i class='fa fa-trash-alt'></i></a>
                                </div></td>
                            </tr>";
                                    $no++;
                                }
                            } else {
                                echo "<tr><td class='text-center text-green' colspan='6'>Kosong</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="panel-bottom"></div>
        </div>
    </div>
</div>
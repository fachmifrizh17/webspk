<!DOCTYPE html>
<html>

<head>
    <title>Sistem Pendukung Keputusan Pemilihan Fotografer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="asset/css/login.css">
    <link rel="stylesheet" type="text/css" href="asset/plugin/font-icon/css/fontawesome-all.min.css">
    <link rel="icon" type="image/svg+xml" href="asset/image/tittle.svg">
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
</head>

<body>
    <!-- judul -->
    <div class="panel">
        <div class="panel-middle" id="judul">
            <img src="asset/image/kamera.svg" alt="Barang Image">
            <div id="judul-text">
                <h2 class="text-green">Tema Foto</h2>
                Halamanan Administrator Tema Foto
            </div>
        </div>
    </div>
    <!-- judul -->
    <div class="row">
        <div class="col-4">
            <div class="panel">
                <?php
                if (@htmlspecialchars($_GET['aksi']) == 'ubah') {
                    include 'ubahtema.php';
                } else {
                    include 'tambahtema.php';
                }
                ?>
            </div>
        </div>
        <div class="col-8">
            <div class="panel">
                <div class="panel-top">
                    <b class="text-green">Daftar Tema Foto</b>
                </div>
                <div class="panel-middle">
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Tema</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $query = "SELECT * FROM jenis_tema";
                                $execute = $konek->query($query);
                                if ($execute->num_rows > 0) {
                                    $no = 1;
                                    while ($data = $execute->fetch_array(MYSQLI_ASSOC)) {
                                        echo "
                                    <tr id='data'>
                                        <td>$no</td>
                                        <td>$data[nama_tema]</td>
                                        <td>
                                        <div class='norebuttom'>
                                        <a class=\"btn btn-light-green\" href='./?page=tema&aksi=ubah&id=" . $data['id_jenistema'] . "'><i class='fa fa-pencil-alt'></i></a>
                                        <a class=\"btn btn-yellow\" data-a=" . $data['nama_tema'] . " id='hapus' href='./proses/proseshapus.php/?op=tema&id=" . $data['id_jenistema'] . "'><i class='fa fa-trash-alt'></i></a></td>
                                    </div></tr>";
                                        $no++;
                                    }
                                } else {
                                    echo "<tr><td  class='text-center text-green' colspan='3'>Kosong</td></tr>";
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
</body>
<script src="asset/js/jquery.js" type="text/javascript"></script>
<script src="asset/js/main.js" type="text/javascript"></script>

</html>
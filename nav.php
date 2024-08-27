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
    </style>
</head>

<body>
    <div class="nav-container">
        <button class="btn btn-second" id="hidden"><i class="fa fa-list text-white"></i></button>
        <ul class="nav" id="nav-menu">
            <li><a href="./?page=beranda">Beranda</a></li>
            <li><a href="./?page=tema">Tema Foto</a></li>
            <li><a href="./?page=peserta">Fotographer</a></li>
            <li><a href="./?page=kriteria">Kriteria</a></li>
            <li><a href="./?page=subkriteria">Sub Kriteria</a></li>
            <li><a href="./?page=bobot">Bobot</a></li>
            <li><a href="./?page=penilaian">Penilaian</a></li>
            <li><a href="./?page=hasil">Hasil</a></li>
            <li><a href="./logout.php" id="out">Keluar</a></li>
        </ul>
    </div>

    <script src="asset/js/jquery.js" type="text/javascript"></script>
    <script src="asset/js/main.js" type="text/javascript"></script>
    <script>
        document.getElementById('hidden').addEventListener('click', function() {
            document.getElementById('nav-menu').classList.toggle('show');
        });
    </script>
</body>

</html>
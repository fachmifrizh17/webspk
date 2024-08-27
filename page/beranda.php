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

        .panel-middle {
            display: flex;
            align-items: center;
        }

        #judul img {
            max-width: 50px;
            margin-right: 20px;
        }

        #judul-text h2 {
            margin: 0;
        }

        .text-green {
            color: green;
        }

        .panel-middle.text-center h1 {
            font-size: 24px;
            margin: 0;
        }

        @media (max-width: 768px) {
            .panel-middle {
                flex-direction: column;
                text-align: center;
            }

            #judul img {
                margin-bottom: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="panel">
        <div class="panel-middle" id="judul">
            <img src="asset/image/home.svg" alt="Beranda Image">
            <div id="judul-text">
                <h2 class="text-green">BERANDA</h2>
                Halamanan Utama Administrator
            </div>
        </div>
    </div>
    <!-- judul -->
    <div class="panel">
        <div class="panel-middle text-center">
            <h1>
                Selamat Datang, <span class="text-green">Administrator</span><br>
                di Sistem Pendukung Keputusan pemilihan Hasil Foto berbasis web menggunakan metode <span class="text-green">Simple Additive Weighting</span>
            </h1>
        </div>
        <div class="panel-bottom"></div>
    </div>
</body>
<script src="asset/js/jquery.js" type="text/javascript"></script>
<script src="asset/js/main.js" type="text/javascript"></script>

</html>
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
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background: url('asset/image/backlogin.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        #panel-login {
            position: relative;
            background-color: rgba(255, 255, 255, 0.3);
            /* Transparent background */
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.5);
            border-radius: 10px;
            width: 350px;
            /* Fixed width */
            z-index: 2;
            margin: 20px;
        }

        .group-input {
            background: rgba(255, 255, 255, 0.5);
            /* Slightly less transparent for input fields */
            padding: 10px;
            border-radius: 5px;
            margin-bottom: 15px;
        }

        .btn {
            display: block;
            width: 100%;
            padding: 10px;
            border: none;
            background-color: gray;
            color: white;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
        }

        .btn:hover {
            background-color: darkgray;
        }

        .alert {
            position: absolute;
            top: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        @media (min-width: 768px) {
            #panel-login {
                width: 60%;
                max-width: 500px;
            }
        }

        @media (min-width: 1024px) {
            #panel-login {
                width: 40%;
                max-width: 600px;
            }
        }
    </style>
</head>

<body id="login">
    <div class="alert alert-red text-center" style="display:none;" id="alert"><i class="fa fa-info-circle fa-lg"></i>
        <p id="value">sdasdasd</p>
    </div>
    <div id="panel-login">
        <form id="formlogin" method="POST" action="ceklogin.php">
            <div class="group-input">
                <label for="username">Username :</label>
                <input type="text" class="form-custom" required autocomplete="off" placeholder="Username" id="username" name="username">
            </div>
            <div class="group-input">
                <label for="password">Password :</label>
                <input type="password" class="form-custom" required autocomplete="off" placeholder="Password" id="password" name="password">
            </div>
            <button class="btn btn-green btn-full"><i class="fa fa-arrow-alt-circle-right text-white"></i> Login</button>
        </form>
    </div>
    <p>&copy copyright 2024</p>
</body>
<script src="asset/js/jquery.js" type="text/javascript"></script>
<script src="asset/js/main.js" type="text/javascript"></script>

</html>
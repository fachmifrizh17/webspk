<?php
require 'connect.php'; // Pastikan koneksi ke database tersedia

$user = isset($_POST['username']) ? trim($_POST['username']) : '';
$pass = isset($_POST['password']) ? trim($_POST['password']) : '';

// Validasi input
if (empty($user) && empty($pass)) {
    $result = "Username dan password tidak boleh kosong";
} elseif (empty($user)) {
    $result = "Username tidak boleh kosong";
} elseif (empty($pass)) {
    $result = "Password tidak boleh kosong";
} else {
    // Menggunakan prepared statements untuk mencegah SQL Injection
    $stmt = $konek->prepare("SELECT * FROM user WHERE username = ?");
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($konek->error));
    }
    $stmt->bind_param("s", $user);
    $stmt->execute();
    $execute = $stmt->get_result();
    
    if ($execute->num_rows > 0) {
        $data = $execute->fetch_array(MYSQLI_ASSOC);
        if (password_verify($pass, $data['password'])) {
            session_start();
            $_SESSION['user'] = $data['username'];
            $_SESSION['pass'] = $data['password'];
            // header('location:./index.php');
            $result = 'success';
        } else {
            $result = "Username dan Password tidak cocok";
        }
    } else {
        $result = "Username tidak terdaftar";
    }
    $stmt->close();
}

// Mengembalikan hasil dalam format JSON
echo json_encode($result);
?>

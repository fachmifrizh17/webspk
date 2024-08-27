<?php
$konek = new mysqli('localhost', 'root', '', 'spksaw');

// Cek koneksi
if ($konek->connect_errno) {
    die("Connection failed: " . $konek->connect_error);
}
?>

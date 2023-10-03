<?php
$host = "localhost"; // Nama host database
$username = "root"; // Nama pengguna database
$password = ""; // Kata sandi database
$database = "sikupat"; // Nama database

// Membuat koneksi
$koneksi = mysqli_connect($host, $username, $password, $database);

// Memeriksa koneksi
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

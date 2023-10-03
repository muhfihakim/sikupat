<?php
session_start();
include('admin/koneksi.php');

$fullname = addslashes(trim($_POST['fullname']));
$username = addslashes(trim($_POST['username']));
$password = addslashes(trim($_POST['password']));

if (!empty($fullname) || !empty($username) || !empty($password)) {
    /*cek duplikat username*/
    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE user='$username' ");
    $jml = mysqli_num_rows($cek);
    if ($jml > 0) {
        echo "<script>alert('User Sudah Ada!'); window.location.href='create_account.php';</script>";
        die();
    } else {
        $password_encrypted = password_hash($password, PASSWORD_DEFAULT);
        $input = mysqli_query($koneksi, "INSERT INTO user(nama,user,pwd) VALUES('$fullname','$username','$password_encrypted') ");
        if ($input) {
            echo "<script>alert('Akun Berhasil Dibuat'); window.location.href='index.php';</script>";
        } else {
            echo "<script>alert('Akun Gagal Dibuat'); window.location.href='index.php';</script>";
        }
    }
}

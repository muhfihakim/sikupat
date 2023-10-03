<?php
session_start();
include('admin/koneksi.php');

$username = addslashes(trim($_POST['username']));
$password = addslashes(trim($_POST['password']));

if (!empty($username) || !empty($password)) {
    $seq = mysqli_query($koneksi, "SELECT * FROM user WHERE user='$username' ");
    $data = mysqli_fetch_array($seq);
    $jml = mysqli_num_rows($seq);
    if ($jml > 0) {
        if (password_verify($password, $data['pwd'])) {
            $_SESSION['username'] = $data['user'];
            $_SESSION['user_autentification'] = "valid";
            header("location: admin/index.php");
        } else {
            echo "<script>alert('Password Salah!'); window.location.href='index.php';</script>";
        }
    } else {
        echo "<script>alert('Username Salah!'); window.location.href='index.php';</script>";
    }
}

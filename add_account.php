<?php
// Cek apakah ada data POST yang dikirim dari form sebelumnya
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ganti 'token_yang_benar' dengan token yang seharusnya Anda miliki
    $token_yang_benar = "diskominfo";

    // Cek apakah token yang dikirim dari form sesuai dengan token yang benar
    if (isset($_POST['token']) && $_POST['token'] === $token_yang_benar) {
        // Token benar, kita set variabel session sebagai tanda autentikasi
        session_start();
        $_SESSION['auth'] = true;

        // Redirect ke halaman utama (contoh: "index.php")
        header("Location: index.php");
        exit();
    } else {
        // Token salah, kembali ke halaman sebelumnya atau tampilkan pesan error
        // Misalnya: header("Location: halaman_sebelumnya.php?error=1");
        echo "Token salah! Halaman tidak dapat diakses.";
        exit();
    }
}

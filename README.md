# **🌿Sistem Informasi Kunjungan Pusat Data🌿**

👨‍💻 M. L. Hakim
🌏 PHP Native
🍍 Subang - Jabar | 
Instagram : [/@luthfikim](https://www.instagram.com/luthfikim_/)
YouTube : [/@nexted](https://www.youtube.com/@nexted23)


# Konfigurasi Aplikasi

## Deskripsi

Repositori ini berisi file konfigurasi database yang digunakan dalam aplikasi ini. File `koneksi.php` digunakan untuk menghubungkan aplikasi dengan database yang diperlukan untuk menjalankan fungsi-fungsi tertentu.

## Daftar Berkas Konfigurasi

- `/daftar_hadir/koneksi.php`: Berkas konfigurasi database untuk bagian `/daftar_hadir` aplikasi.
- `/admin/koneksi.php`: Berkas konfigurasi database untuk bagian `/admin` aplikasi.

## Penggunaan

Sebelum menjalankan atau menggunakan aplikasi ini, pastikan Anda telah mengkonfigurasi berkas `koneksi.php` dengan benar. Berikut adalah langkah-langkah yang perlu Anda lakukan:

1. Buka berkas `/daftar_hadir/koneksi.php` untuk konfigurasi bagian `/daftar_hadir` aplikasi.
2. Buka berkas `/admin/koneksi.php` untuk konfigurasi bagian `/admin` aplikasi.
3. Sesuaikan informasi koneksi database, seperti host, nama pengguna, kata sandi, dan nama database.
4. Simpan perubahan yang telah Anda buat.

## Contoh Konfigurasi

Berikut adalah contoh sederhana konfigurasi dalam berkas `koneksi.php`:

```php
<?php
// Konfigurasi Database
$host = "localhost";
$username = "pengguna_database";
$password = "kata_sandi";
$database = "nama_database";

// Membuat Koneksi
$conn = new mysqli($host, $username, $password, $database);

// Memeriksa Koneksi
if ($conn->connect_error) {
    die("Koneksi ke database gagal: " . $conn->connect_error);
}
?>


<?php
// Koneksi ke database
include 'koneksi.php';

// Mengambil data dari form
$nama = $_POST['nama'];
$instansi = $_POST['instansi'];
$kotakab = $_POST['kotakab'];
$jenisidentitas = $_POST['jenisidentitas'];
$noidentitas = $_POST['noidentitas'];
$tanggal = $_POST['tanggal'];
$jammasuk = $_POST['jammasuk'];
$jamkeluar = $_POST['jamkeluar'];
$tujuan = $_POST['tujuan'];
$keterangan = $_POST['keterangan'];

// Memproses gambar
$gambar = $_FILES['image']['name'];
$targetDir = "uploads/";
$targetFileGambar = $targetDir . basename($gambar);
$gambarUploadOk = 1;
$imageFileType = strtolower(pathinfo($targetFileGambar, PATHINFO_EXTENSION));

// Menentukan nama file gambar
$namaGambar = $_POST['nama']; // Mengambil nilai dari form "nama"
$gambarFile = $targetDir . "gambar_" . time() . "_" . $namaGambar . "." . $imageFileType;
$targetFileGambar = $targetDir . basename($gambarFile);

// Cek apakah file gambar sudah ada
if (file_exists($targetFileGambar)) {
    echo '<script>alert("Maaf, file gambar sudah ada.");</script>';
    $gambarUploadOk = 0;
}

// Jika tidak ada kesalahan, unggah file gambar
if ($gambarUploadOk == 1) {
    // Mengompres gambar sebelum diunggah
    compressImage($_FILES['image']['tmp_name'], $targetFileGambar, 75); // Ubah nilai kualitas sesuai kebutuhan
}

// Memproses tandatangan
if (isset($_POST['ttd'])) {
    $ttd = $_POST['ttd'];
    if ($ttd !== null) {
        $ttd = str_replace('data:image/png;base64,', '', $ttd);
        $ttd = str_replace(' ', '+', $ttd);
        $ttdData = base64_decode($ttd);

        // Menentukan nama file tandatangan
        $namaTtd = $_POST['nama']; // Mengambil nilai dari form "nama"
        $ttdFile = $targetDir . "ttd_" . time() . "_" . $namaTtd . ".png";
        $targetFileTtd = $targetDir . basename($ttdFile);

        // Menyimpan file tandatangan
        if (file_put_contents($ttdFile, $ttdData)) {
            // echo '<script>alert("Tandatangan berhasil disimpan.");</script>';
        } else {
            echo '<script>alert("Maaf, terjadi kesalahan saat menyimpan tandatangan."); window.close();</script>';
        }
    } else {
        echo '<script>alert("Maaf, nilai kunci \'ttd\' adalah null."); window.close();</script>';
    }
} else {
    echo '<script>alert("Maaf, kunci \'ttd\' tidak ada dalam $_POST."); window.close();</script>';
}

// Memasukkan data ke database
$sql = "INSERT INTO sikupat (nama, instansi, kotakab, jenisidentitas, noidentitas, tanggal, jammasuk, jamkeluar, tujuan, ket, ttd, foto)
        VALUES ('$nama', '$instansi', '$kotakab', '$jenisidentitas', '$noidentitas', '$tanggal', '$jammasuk', '$jamkeluar', '$tujuan', '$keterangan', '$targetFileTtd', '$targetFileGambar')";

if ($koneksi->query($sql) === TRUE) {
    echo '<script>alert("Terimakasih ' . $nama . ' sudah mengisi daftar hadir. Jangan lupa untuk berkunjung kembali."); window.close();</script>';
} else {
    echo '<script>alert("Maaf, terjadi kesalahan saat menyimpan data ke database: ' . $koneksi->error . '"); window.close();</script>';
}

// Fungsi untuk mengompres gambar menggunakan library GD
function compressImage($source, $destination, $quality)
{
    $info = getimagesize($source);

    if ($info['mime'] == 'image/jpeg') {
        $image = imagecreatefromjpeg($source);
    } elseif ($info['mime'] == 'image/png') {
        $image = imagecreatefrompng($source);
    }

    // Simpan gambar dengan kualitas kompresi
    imagejpeg($image, $destination, $quality);

    // Hapus objek gambar dari memori
    imagedestroy($image);
}

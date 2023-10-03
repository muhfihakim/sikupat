<?php
include '../../daftar_hadir/koneksi.php';

// Query untuk mengambil data dari database dan diurutkan berdasarkan timestamp terbaru
$query = "SELECT * FROM sikupat ORDER BY tanggal DESC"; // Ganti 'tanggal' dengan nama kolom timestamp yang sesuai

$result = mysqli_query($koneksi, $query);

// Buat array untuk menampung data
$data = array();

// Loop melalui hasil query dan tambahkan data ke array
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

// Kembalikan data dalam format JSON
echo json_encode(array("data" => $data));

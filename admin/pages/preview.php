<?php
// Fungsi untuk mengambil data dari database (contoh penggunaan saja)
function getDataFromDatabase($startDate, $endDate) {
    // Gantilah ini dengan koneksi ke database Anda
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "sikupat";

    $conn = new mysqli($host, $username, $password, $database);

    if ($conn->connect_error) {
        die("Koneksi ke database gagal: " . $conn->connect_error);
    }

    // Query untuk mengambil data berdasarkan rentang tanggal
    $query = "SELECT * FROM sikupat WHERE tanggal BETWEEN '$startDate' AND '$endDate'";
    $result = $conn->query($query);

    $data = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    $conn->close();

    return $data;
}

if (isset($_GET['dari']) && isset($_GET['ke'])) {
    $startDate = $_GET['dari'];
    $endDate = $_GET['ke'];

    // Ambil data dari database berdasarkan rentang waktu tanggal
    $data = getDataFromDatabase($startDate, $endDate);

    // Buat HTML untuk tabel
    $html = '<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Laporan SIKUPAT</title>
        <link rel="stylesheet" type="text/css" href="main.css" />
    </head>
    <body>
        <table class="tg" style="table-layout: fixed; width: 100%">
            <colgroup>
                <col style="width: 63px">
                <col style="width: 25px">
                <col style="width: 200px">
                <col style="width: 120px">
                <col style="width: 120px">
                <col style="width: 87px">
                <col style="width: 191px">
                <col style="width: 76px">
                <col style="width: 108px">
                <col style="width: 108px">
                <col style="width: 108px">
                <col style="width: 201px">
                <col style="width: 114px">
                <col style="width: 114px">
                <col style="width: 101px">
            </colgroup>
            <thead>
                <tr>
            <th class="tg-xpxm">Nomor</th>
            <th class="tg-xpxm">:</th>
            <th class="tg-lgk6"></th>
            <th class="tg-gh6k" colspan="11" rowspan="4">DAFTAR HADIR KUNJUNGAN TAMU DATA CENTER DISKOMINFO<br>KABUPATEN SUBANG</th>
            <th class="tg-lgk6" rowspan="4">
            <div style="display: flex; justify-content: center;">
                <img src="/sikupat/admin/pages/cetak/logo_subang.png" style="width: 100%; height: auto;">
              </div>
            </th>
          </tr>
          <tr>
            <th class="tg-wpk1">Revisi</th>
            <th class="tg-wpk1">:</th>
            <th class="tg-5xcx"></th>
          </tr>
          <tr>
            <th class="tg-wpk1">Periode</th>
            <th class="tg-wpk1">:</th>
            <th class="tg-5xcx"></th>
          </tr>
          <tr>
            <th class="tg-wpk1"></th>
            <th class="tg-wpk1">:</th>
            <th class="tg-5xcx"></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="tg-5xcx" colspan="15"></td>
          </tr>
          <tr>
            <td class="tg-4gfj" rowspan="2">No</td>
            <td class="tg-4gfj" colspan="6">Identitas</td>
            <td class="tg-4gfj" rowspan="2">No. Badge</td>
            <td class="tg-20nl" colspan="3">Waktu</td>
            <td class="tg-4gfj" rowspan="2">Tujuan</td>
            <td class="tg-20nl" colspan="2">No. Seri Perangkat</td>
            <td class="tg-4gfj" rowspan="2">TTD</td>
          </tr>
          <tr>
            <td class="tg-4gfj" colspan="2">Nama Lengkap</td>
            <td class="tg-4gfj">Instansi</td>
            <td class="tg-4gfj">Alamat</td>
            <td class="tg-4gfj">Jenis Identitas</td>
            <td class="tg-4gfj">No. Identitas</td>
            <td class="tg-4gfj">Tanggal</td>
            <td class="tg-4gfj">Jam Masuk</td>
            <td class="tg-4gfj">Jam Keluar</td>
            <td class="tg-4gfj">Masuk</td>
            <td class="tg-4gfj">Keluar</td>
          </tr>
            </thead>
            <tbody>';

    // Tambahkan data ke dalam tabel
    // Inisialisasi variabel nomor
    $nomor = 1;

    foreach ($data as $row) {
        $html .= '<tr>';
        // Tambahkan kolom-kolom sesuai dengan data Anda
        $html .= '<td class="tg-4gfj">' . $nomor . '</td>';
        $html .= '<td class="tg-4gfj" colspan="2">' . $row['nama'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['instansi'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['kotakab'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['jenisidentitas'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['noidentitas'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['nobadge'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['tanggal'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['jammasuk'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['jamkeluar'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['tujuan'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['masukperangkat'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1">' . $row['keluarperangkat'] . '</td>';
        $html .= '<td class="tg-4gfj" colspan="1"><img src="../../daftar_hadir/' . $row['ttd'] . '" width="80" height="20"></td>';

        
        // Tingkatkan nilai variabel nomor
         $nomor++;
        
        // Lanjutkan menambahkan kolom-kolom lainnya sesuai kebutuhan
        $html .= '</tr>';
    }

    $html .= '</tbody>
        </table>
    </body>
    </html>';

    // Set header untuk mengatur tipe konten sebagai HTML
    header('Content-Type: text/html');

    // Tampilkan HTML
    echo $html;
} else {
    echo "Data tanggal tidak tersedia.";
}
?>

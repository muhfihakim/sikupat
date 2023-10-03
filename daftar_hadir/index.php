<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Kodinger">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>SIKUPAT</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <link type="text/css" href="js/jquery-ui.css" rel="stylesheet">
    <script type="text/javascript" src="js/jquery-ui.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/my-login.css">
    <script type="text/javascript" src="js/jquery.signature.min.js"></script>
    <script type="text/javascript" src="js/jquery.ui.touch-punch.min.js"></script>
    <link rel="stylesheet" type="text/css" href="css/jquery.signature.css">
    <style>
        .kbw-signature {
            width: 100%;
            height: 160px;
        }

        #sig canvas {
            width: 100% !important;
            height: auto;
        }
    </style>

</head>

<body class="my-login-page">
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-md-center h-100">
                <div class="card-wrapper">
                    <div class="brand">
                        <img src="img/datacenter1.png" alt="logo">
                    </div>
                    <div class="card fat">
                        <div class="card-body">
                            <h6 style="text-align: center;">Sistem Informasi Kunjungan Pusat Data</h6>
                            <h4 style="text-align: center;">SIKUPAT</h4>
                            <p style="text-align: center;">Dikelola Oleh Bidang TIK dan Persandian</p>
                            <P><strong>IDENTITAS</strong></P>
                            <form method="POST" action="aksi_upload.php" class="my-login-validation" novalidate enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nama">Nama Lengkap<font color="red">*</font></label>
                                    <input id="nama" type="text" class="form-control" name="nama" value="" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="instansi">Instansi<font color="red">*</font></label>
                                    <input id="instansi" type="text" class="form-control" name="instansi" value="" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="kotakab">Kota/Kab<font color="red">*</font></label>
                                    <input id="kotakab" type="text" class="form-control" name="kotakab" value="" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="jenisidentitas">Jenis Identitas<font color="red">*</font></label>
                                    <select class="form-control" id="jenisidentitas" name="jenisidentitas">
                                        <option>Pilih Jenis Identitas</option>
                                        <option>KTP</option>
                                        <option>SIM</option>
                                        <option>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="noidentitas">No. Identitas<font color="red">*</font></label>
                                    <input id="noidentitas" type="number" class="form-control" name="noidentitas" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="nobadge">No. Badge</label>
                                    <input id="nobadge" type="number" class="form-control" name="nobadge">
                                </div>
                                <p><strong>WAKTU</strong></p>
                                <div class="form-group">
                                    <label for="tanggal">Tanggal<font color="red">*</font></label>
                                    <input id="tanggal" type="date" class="form-control" name="tanggal" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="jammasuk">Jam Masuk<font color="red">*</font></label>
                                    <input id="jammasuk" type="time" class="form-control" name="jammasuk" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="jamkeluar">Jam Keluar<font color="red">*</font></label>
                                    <input id="jamkeluar" type="time" class="form-control" name="jamkeluar" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="tujuan">Tujuan<font color="red">*</font></label>
                                    <input id="tujuan" type="text" class="form-control" name="tujuan" required autofocus>
                                </div>
                                <div class="form-group text-center">
                                <button id="togglePerangkat" class="btn btn-warning btn-sm" type="button">Klik Disini Jika Keluar Masuk Perangkat</button>
                                </div>
                                <div class="form-group" id="formPerangkat" style="display: none;">
                                    <label for="keluarperangkat">No Seri Keluar</label>
                                    <input id="keluarperangkat" type="text" class="form-control" name="keluarperangkat">
                                </div>
                                <div class="form-group" id="formMasukPerangkat" style="display: none;">
                                    <label for="masukperangkat">No Seri Masuk</label>
                                    <input id="masukperangkat" type="text" class="form-control" name="masukperangkat">
                                </div>
                                <div class="form-group">
                                    <label for="gambar">Selfie<font color="red">*</font></label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="image" onchange="showFileName()">
                                        <label class="custom-file-label" for="gambar" id="image">Ambil Foto</label>
                                    </div>
                                    <span id="image-name"></span> <!-- Tambahkan elemen span ini -->
                                </div>
                                <div class="form-group">
                                    <label class="" for="">Tanda Tangan:<font color="red">*</font></label>
                                    <div id="sig" name='ttd'>
                                    </div>
                                    <button id="clear">Ulangi Tanda Tangan</button>
                                    <textarea id="signature64" name="ttd" style="display: none"></textarea>
                                </div>
                                <div>
                                    <br>
                                </div>
                                <div class="form-group">
                                    <label for="keterangan">Keterangan</label>
                                    <textarea class="form-control" id="keterangan" name="keterangan" rows="3"></textarea>
                                </div>
                                <div><br></div>
                                <div class="form-group m-0 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Submit
                                    </button>
                                </div>
                                <div class="mt-4 text-center">
                                    PASTIKAN MENGISI DATA DENGAN BENAR
                                </div>
                            </form>

                        </div>
                    </div>
                    <div class="footer">
                        2023 &mdash; SIKUPAT
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        const togglePerangkatButton = document.getElementById("togglePerangkat");
        const formPerangkat = document.getElementById("formPerangkat");
        const formMasukPerangkat = document.getElementById("formMasukPerangkat");

        togglePerangkatButton.addEventListener("click", function () {
            if (formPerangkat.style.display === "none") {
                formPerangkat.style.display = "block";
                formMasukPerangkat.style.display = "block";
            } else {
                formPerangkat.style.display = "none";
                formMasukPerangkat.style.display = "none";
            }
        });
    });
</script>

    <script type="text/javascript">
        var sig = $('#sig').signature({
            syncField: '#signature64',
            syncFormat: 'PNG'
        });
        $('#clear').click(function(e) {
            e.preventDefault();
            sig.signature('clear');
            $("#signature64").val('');
        });
    </script>
    </script>
    <script src="js/signature_pad.min.js"></script>
    <script src="js/jquery-3.3.1.slim.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/my-login.js"></script>
    <script>
        function showFileName() {
    var input = document.getElementById("gambar");
    var label = document.getElementById("image");
    var imageName = document.getElementById("image-name"); // Tambahkan ini

    if (input.files.length > 0) {
        label.innerText = input.files[0].name;
        imageName.innerText = "Foto berhasil terpilih, silahkan lanjutkan."; // Tambahkan ini
    } else {
        label.innerText = "Ambil Foto";
        imageName.innerText = ""; // Kosongkan nama gambar jika tidak ada yang dipilih
    }
}
    </script>
    <script disable-devtool-auto src="js/disable-devtool.js"></script>
</body>

</html>
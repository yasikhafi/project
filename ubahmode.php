<?php
include('lib/dbconnection.php');

//baca mode absensi terakhir
$mode = mysqli_query($koneksi, "SELECT * FROM mode");
$data_mode = mysqli_fetch_array($mode);
$mode_akses = $data_mode['mode'];

// status terakhir kemudian ditambah 1
$mode_akses = $mode_akses + 1;
if ($mode_akses > 2)
    $mode_akses = 1;

// simpan mode akses ditabel status dengan cara update
$simpan = mysqli_query($conn, "UPDATE mode SET mode='$mode_akses'");
if ($simpan)
    echo "Berhasil";
else
    echo "Gagal";

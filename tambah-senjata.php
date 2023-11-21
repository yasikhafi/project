<?php
include('lib/dbconnection.php');

// Query untuk mengambil data dari tabel tmploadcell
$selectQuery = "SELECT * FROM tmploadcell";
$result = mysqli_query($conn, $selectQuery);

// Mengecek apakah query berhasil dieksekusi
if ($result) {
    // Mengambil data dari tmploadcell dan memasukkan ke tabel senjata
    $insertQuery = "INSERT INTO senjata (id_senjata, status) SELECT id, status FROM tmploadcell";
    if (mysqli_query($conn, $insertQuery)) {
        echo "Data berhasil dipindahkan ke tabel senjata.";
    } else {
        echo "Error: " . $insertQuery . "<br>" . mysqli_error($conn);
    }

    // Menghapus data dari tmploadcell setelah dipindahkan
    $deleteQuery = "DELETE FROM tmploadcell";
    if (mysqli_query($conn, $deleteQuery)) {
        echo "Data berhasil dihapus dari tabel tmploadcell.";
    } else {
        echo "Error: " . $deleteQuery . "<br>" . mysqli_error($conn);
    }
} else {
    echo "Error: " . $selectQuery . "<br>" . mysqli_error($conn);
}

// Tutup koneksi database
mysqli_close($conn);

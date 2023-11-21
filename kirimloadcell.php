<?php
include('lib/dbconnection.php');

if (isset($_GET['id_senjata']) && isset($_GET['status']) && isset($_GET['berat'])) {
    $id_senjata = mysqli_real_escape_string($conn, $_GET['id_senjata']);
    $status = mysqli_real_escape_string($conn, $_GET['status']);
    $berat = mysqli_real_escape_string($conn, $_GET['berat']);

    // Cek apakah senjata sudah terdaftar di tabel weapon
    $checkWeaponQuery = "SELECT * FROM weapon WHERE id_senjata = '$id_senjata'";
    $checkWeaponResult = mysqli_query($conn, $checkWeaponQuery);

    if (!$checkWeaponResult) {
        echo "Error: " . $checkWeaponQuery . "<br>" . mysqli_error($conn);
    } else {
        if (mysqli_num_rows($checkWeaponResult) > 0) {
            // Senjata sudah terdaftar, update status dan berat di tabel tmploadcell
            $updateQuery = "UPDATE tmploadcell SET status = '$status', berat = '$berat' WHERE id_senjata = '$id_senjata'";
            if (mysqli_query($conn, $updateQuery)) {
                echo "Status dan berat berhasil diperbarui dalam tabel tmploadcell.";
            } else {
                echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
            }
        } else {
            // Jika baris dengan ID tersebut belum ada, masukkan data baru
            $insertQuery = "INSERT INTO tmploadcell (id_senjata, status, berat) VALUES ('$id_senjata', '$status', '$berat')";
            if (mysqli_query($conn, $insertQuery)) {
                echo "Data berhasil disimpan ke dalam tabel tmploadcell.";

                // Masukkan id_senjata ke dalam tabel weapon
                $insertWeaponQuery = "INSERT INTO weapon (id_senjata) VALUES ('$id_senjata')";
                if (mysqli_query($conn, $insertWeaponQuery)) {
                    echo "Senjata berhasil terdaftar di dalam tabel weapon.";
                } else {
                    echo "Error: " . $insertWeaponQuery . "<br>" . mysqli_error($conn);
                }
            } else {
                // Jika gagal, coba lakukan UPDATE (kemungkinan race condition)
                $updateQuery = "UPDATE tmploadcell SET status = '$status', berat = '$berat' WHERE id_senjata = '$id_senjata'";
                if (mysqli_query($conn, $updateQuery)) {
                    echo "Status dan berat berhasil diperbarui dalam tabel tmploadcell.";
                } else {
                    echo "Error: " . $updateQuery . "<br>" . mysqli_error($conn);
                }
            }
        }
    }
} else {
    echo "Parameter tidak lengkap. ID senjata, berat, dan status diperlukan.";
}

// Tutup koneksi database
mysqli_close($conn);

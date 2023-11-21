<?php
include('lib/dbconnection.php');
session_start();
// baca id data yang akan dihapus
$id_senjata = $_GET['id_senjata'];

// hapus data
$hapus = mysqli_query($conn, "DELETE FROM owner WHERE id_senjata='$id_senjata'");

// jika berhasil terhapus, tampilan pesan terhapus
// kembali ke data akses
if ($hapus) {
    echo "<script>
                alert('Terhapus');
                location.replace('data-akses.php');
                </script>
                ";
} else {
    echo "<script>
                alert('Gagal Terhapus');
                location.replace('data-akses.php');
                </script>
                ";
}

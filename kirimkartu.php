<?php
include('lib/dbconnection.php');
// session_start();
if (isset($_GET["nokartu"])) {
    // baca no kartu dari NodeMCU
    $nokartu = $_GET['nokartu'];
    // kosongkan tabel tmprfid
    // mysqli_query($conn, "DELETE FROM tmprfid");
    // simpan no kartu yang baru ke tabel tmprfid
    $simpan = "INSERT INTO tmprfid (nokartu) VALUES ('$nokartu')";
    if ($conn->query($simpan) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $simpan . " => " . $conn->error;
    }
    $conn->close();
} else {
    echo "data is not set";
}

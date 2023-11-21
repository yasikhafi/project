<?php
// Load the database configuration file
include('lib/dbconnection.php');

// Filter the excel data
function filterData(&$str)
{
    $str = preg_replace("/\t/", "\\t", $str);
    $str = preg_replace("/\r?\n/", "\\n", $str);
    if (strstr($str, '"')) $str = '"' . str_replace('"', '""', $str) . '"';
}

// Excel file name for download
$fileName = "weapon-usage" . date('Y-m-d') . ".xls";

// Column names
$fields = array('NO', 'WEAPON ID', 'USER ID', 'USERNAME', 'DATE', 'OUT', 'IN');

// Display column names as the first row
$excelData = implode("\t", array_values($fields)) . "\n";

// Fetch records from the status table
date_default_timezone_set('Asia/Jakarta');
$tanggal = date('Y-m-d');
$sql = "SELECT c.id_senjata, b.id_pengguna, b.nama_pengguna, a.tanggal, a.keluar, a.masuk FROM status a, owner b, tmploadcell c WHERE a.id_senjata=c.id_senjata AND a.tanggal='$tanggal'";
$result = mysqli_query($conn, $sql);

// Check for errors in SQL query execution
if (!$result) {
    die("Error in SQL query: " . mysqli_error($conn));
}

if (mysqli_num_rows($result) > 0) {
    // Output each row of the data
    $no = 0;
    while ($row = mysqli_fetch_array($result)) {
        $no++;
        $lineData = array(
            $no,
            $row['id_senjata'],
            $row['id_pengguna'],
            $row['nama_pengguna'],
            $row['tanggal'],
            $row['keluar'],
            $row['masuk']
        );
        array_walk($lineData, 'filterData');
        $excelData .= implode("\t", array_values($lineData)) . "\n";
    }
} else {
    $excelData .= 'No records found...' . "\n";
}

// Headers for download
header("Content-Type: application/vnd.ms-excel");
header("Content-Disposition: attachment; filename=\"$fileName\"");

// Render excel data
echo $excelData;

exit;

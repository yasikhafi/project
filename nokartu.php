<?php
error_reporting(0);
include('lib/dbconnection.php');
// session_start();
// baca isi tabel tmprfid
$sql = mysqli_query($conn, "SELECT * FROM tmprfid");
$data = mysqli_fetch_array($sql);

// baca no kartu
$nokartu = $data['nokartu'];
?>

<div class="col-12">
    <label for="inputNanme4" class="form-label">No Kartu</label>
    <input type="text" name="nokartu" id="nokartu" placeholder="Tempelkan Kartu RFID" class="form-control" value="<?php echo $nokartu; ?>">
</div>
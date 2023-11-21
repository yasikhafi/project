<?php
include('lib/dbconnection.php');
session_start();
$username = $_POST['username'];
$pass = md5($_POST['password']);
$time = date('Y-m-d H:i:s');

$sql = "SELECT * FROM users WHERE username='" . $username . "'";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    if ($username == $row['username'] && $pass == $row['password']) {
      $_SESSION["user"] = $row; //simpan data user di session
      header("location: home.php"); //redirect ke file home.php
      break;
    } else {
      echo "<script>
        alert('Nama pengguna dan Kata sandi Anda kurang tepat.');
        location.replace('index.php');
        </script>";
    }
    // end logic buat login
  }
} else {
  echo "<script>
        alert('Nama pengguna dan Kata sandi Anda kurang tepat.');
        location.replace('index.php');
        </script>";
}
$conn->close();

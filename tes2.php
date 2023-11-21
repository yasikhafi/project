<?php

if(isset($_GET["id_senjata"]) && ($_GET["id_pengguna"]) && ($_GET["nama_pengguna"])) {
   $id_senjata = $_GET["id_senjata"]; // get status value from HTTP GET
   $id_pengguna = $_GET["id_pengguna"];
   $nama_pengguna = $_GET["nama_pengguna"];

   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "rack2";


   // Create connection
   $conn = new mysqli($servername, $username, $password, $dbname);
   // Check connection
   if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
   }

   $sql = "INSERT INTO status (id_senjata,id_pengguna,nama_pengguna) VALUES ($id_senjata,$id_pengguna,$nama_pengguna)";

   if ($conn->query($sql) === TRUE) {
      echo "New record created successfully";
   } else {
      echo "Error: " . $sql . " => " . $conn->error;
   }

   $conn->close();
} else {
   echo "data is not set";
}
?>

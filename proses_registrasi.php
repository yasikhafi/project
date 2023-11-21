<?php
include('lib/dbconnection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $pass = md5($_POST['password']);
    $time = date('Y-m-d H:i:s');
    
    $sql = "INSERT INTO users (name, username, email, password, created_at)
    VALUES ('".$name."', '".$username."', '".$email."', '".$pass."', '".$time."')";
    
    if ($conn->query($sql) === TRUE) {
      header("location: index.php");
        // echo "<a href='index.php'>KE Halaman Login</a>";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
    $conn->close();
    ?>
</body>
</html>
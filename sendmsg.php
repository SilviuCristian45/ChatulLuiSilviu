<?php
    include "variables.php";
    $username2 = htmlspecialchars($_GET['username'], ENT_QUOTES, 'UTF-8');
    $msg = htmlspecialchars($_GET['msg'], ENT_QUOTES, 'UTF-8');

    $conn = mysqli_connect($server_name,$username,$password,$db_name);
    $sql = "INSERT INTO `mesaje`(`Expeditor`, `Mesaj`) VALUES ('$username2','$msg')";
    $result = mysqli_query($conn,$sql);
?>

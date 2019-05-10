<?php
    include "variables.php";
    $conn = mysqli_connect($server_name,$username,$password,$db_name);
    $sql = "SELECT * FROM `mesaje` WHERE 1";

    $result = mysqli_query($conn,$sql);
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            echo $row["Expeditor"]. " :  " . $row["Mesaj"] . " <br>";
        }
    }
?>

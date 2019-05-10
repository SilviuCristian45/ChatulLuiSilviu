<?php
    include "variables.php";

    $conn = mysqli_connect($server_name,$username,$password,$db_name);

    $utilizator = htmlspecialchars($_GET['username'], ENT_QUOTES, 'UTF-8');
    $parola = htmlspecialchars($_GET['password'], ENT_QUOTES, 'UTF-8');

    $sql = "SELECT * FROM `utilizatori` WHERE 1";
    $result = mysqli_query($conn,$sql);
    $ok = 0;//pp ca nu se poate loga
    while ($row = mysqli_fetch_assoc($result)) {
        if($row["Username"] == $utilizator && password_verify($password, $row["Parola"])){
            $ok = 1;//marcam ca s-a putut loga
        }
    }
    if($ok == 1)
    {
       echo "Bine ai venit " . $utilizator . " !! Te-ai logat cu succes";
    }
    else echo "ai gresit user-ul sau parola";
?>

<?php
    include "variables.php";
    $conn = mysqli_connect($server_name,$username,$password,$db_name);

    $utilizator = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
    $parola = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
    $email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
    $parola_repetata = htmlspecialchars($_POST['rpassword'], ENT_QUOTES, 'UTF-8');

    $sql = "SELECT * FROM `utilizatori` WHERE 1";
    $ok = 0;//presupun ca nu apare deja
    //vad daca pot insera in baza de date
    $result = mysqli_query($conn,$sql);
    while ($row = mysqli_fetch_assoc($result)) {
        if($row["Username"] == $utilizator){
            $ok = 1;
        }
    }
    if($ok == 0){//daca nu apare deja
        if($utilizator && $parola && $email){
            if($parola == $parola_repetata){
              //criptam parola
              $parola_criptata = password_hash($parola ,PASSWORD_DEFAULT);
              $sql = "INSERT INTO `utilizatori`(`Username`, `Parola`, `E-mail`)  VALUES ('$utilizator','$parola_criptata','$email')";
              $result = mysqli_query($conn,$sql);
              echo "Inregistrare cu succes";
            }
            else echo "Nu ai repetat corect parola in campul 'Repeta parola' ";
        }
        else echo "Eroare : trebuie sa completezi toate campurile ca sa te inregistrezi ";
    }
    else echo "eroare , acest user este deja inregistrat";

?>

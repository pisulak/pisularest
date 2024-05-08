<?php
$host="localhost";
$user="root";
$pass="";
$database="pisularest";
$connection=@mysqli_connect($host, $user, $pass, $database);
        if(!$connection)
        {
            echo "Brak polaczenia!";
            exit();
        }
?>
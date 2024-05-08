<?php

    // POST Z LINKIEM

    if(isset($_POST['jpg']) && isset($_POST['title'])) {

        $jpg=$_POST['jpg'];
        $jpg=htmlentities($jpg);

        $title=$_POST['title'];
        $title=htmlentities($title);

        $description=$_POST['description'];
        $description=htmlentities($description);

        require('connect.php');

        session_start();

        $query="insert into article values('','{$jpg}', '{$title}', '{$description}', now(), current_time(), '{$_SESSION['login']}')";
        $result=mysqli_query($connection, $query);
        if($result) {
            header("Location:index-main.php?status=ok");
        }
        else {
            header("Location:index-main.php?status=error");
        }
        exit();
    }

    // POST Z PLIKIEM

    if(isset($_POST['jpg2']) && isset($_POST['title2'])) {

        $jpg=$_POST['jpg2'];
        $jpg=htmlentities($jpg);

        $title=$_POST['title2'];
        $title=htmlentities($title);

        $description=$_POST['description2'];
        $description=htmlentities($description);

        require('connect.php');

        $query="insert into article values('','{$jpg}', '{$title}', '{$description}', now(), '')";
        $result=mysqli_query($connection, $query);
        if($result) {
            header("Location:index-main.php?status=ok");
        }
        else {
            header("Location:index-main.php?status=error");
        }
        exit();
    }
?>
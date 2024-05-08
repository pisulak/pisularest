<?php
if(isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id=$_GET['id'];
    require('connect.php');

    $query = "delete from article where id=$id";
    $result = mysqli_query($connection, $query);

    if($result){
        header("Location:index-main.php");
        exit();
    }
}
?>
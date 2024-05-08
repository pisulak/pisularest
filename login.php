<?php


if(isset($_POST['login']))
{

    if(!empty($_POST['login']) && !empty($_POST['passw']))
    {

        $login=$_POST['login'];
        $passw=$_POST['passw'];
        $passw = hash('sha256',$passw);

        require('connect.php');

        $login = mysqli_real_escape_string($connection,$login);

        $query="select * from users where login='{$login}' and password='{$passw}'";
        $result=mysqli_query($connection,$query);
        if($result)
        {
            $how_many=mysqli_num_rows($result);
            if($how_many==1) {

                session_start();

                $query = "select user_id, name, login, rank, user_img from users where login like '{$login}'";

                $result=mysqli_query($connection, $query);

                if($result) {
                    while($row = mysqli_fetch_assoc($result)) {
                        
                        if(!isset($_SESSION['user_id']))
                        $_SESSION['user_id'] = $row['user_id'];
                        if(!isset($_SESSION['name']))
                        $_SESSION['name'] = $row['name'];
                        if(!isset($_SESSION['login']))
                        $_SESSION['login'] = $row['login'];
                        if(!isset($_SESSION['rank']))
                        $_SESSION['rank'] = $row['rank'];
                        if(!isset($_SESSION['user_img']))
                        $_SESSION['user_img'] = $row['user_img'];
                    }
                }

                header("Location:index-main.php");
            }
            

            else
            header("Location:index.php?status=error_login");
        }
        else
        {
            echo "błąd";
        }
        exit();

    }
}
header("Location:index.php?status=info");
?>
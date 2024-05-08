
<?php

if(isset($_POST['name']))
{

    if(!empty($_POST['name']) && !empty($_POST['login']) && !empty($_POST['passw']))
    {

        $name=$_POST['name'];
        $name=htmlentities($name);
        $login=$_POST['login'];
        $login=htmlentities($login);
        $passw=$_POST['passw'];
        $passw=hash('sha256',$passw);


        require('connect.php');
        //$connection juz zdefiniowano w connect.php
        $name=mysqli_real_escape_string($connection,$name);
        $login=mysqli_real_escape_string($connection,$login);

        $query = "insert into users values('', '{$name}', '{$login}', '{$passw}', '1', '')";
        $result=mysqli_query($connection,$query);
        if($result)
        {
            header("Location:index.php?status=ok");
        }
        else
        {
            header("Location:index.php?status=error");
        }
        exit();
    }
}
header("Location:index.php?status=info");
?>

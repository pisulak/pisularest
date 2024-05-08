<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisularest - profil</title>
    <link rel="stylesheet" href="style-img-change.css">
    <link rel="stylesheet" href="style-error.css">
	<link rel="shortcut icon" href="grafika/logo-white.png"/>
</head>
<body>

    <?php
        if(isset($_SESSION['login'])) {
    ?>

    <div class="form-area">
        <a href="profile-settings.php"><div class="back2"></div></a>
        <div class="form">
            <form method="post">
                <div><input type="text" name="name" placeholder="Zmień swoje imię"></div>
                <div><input type="text" name="login" placeholder="Zmień swój login"></div>
                <div><input type="password" name="password" placeholder="Zmień swoje hasło"></div>
                <input type="submit" value="Aktualizuj dane!" name="button" class="update-button">
            </form>
        </div>
    </div>
<?php
    if(isset($_POST['name']) && isset($_POST['login']) && isset($_POST['password'])) {

        require('connect.php');
    
        $name=$_POST['name'];
        $login=$_POST['login'];
        $password=$_POST['password'];

        $query = "update users set";

        if(empty($name) && empty($login) && empty($password)) {
            $query = "select * from users";
        }

        if(!empty($name)) {
            $query.=" name='$name'";

            $_SESSION['name'] = $name;

            if(!empty($login) || !empty($password))
                $query.=",";
        }
        if(!empty($login)) {
            $query.=" login='$login'";

            $query2="update article set author='$login' where author='{$_SESSION['login']}'";

            $_SESSION['login'] = $login;

            if(!empty($password))
                $query.=",";
        }
        if(!empty($password)) {
            $password=hash('sha256',$password);
            $query.=" password='{$password}'";
        }

        $query.=" where user_id={$_SESSION['user_id']}";
        
        $result = mysqli_query($connection,$query);
        $result2 = mysqli_query($connection,$query2);

        if($result) {
            header("Location:profile-settings.php");
            exit();
        }
        if($result2) {
            header("Location:profile-settings.php");
            exit();
        }
    }
}
else {
?>
    <div class="error-background">
        <a href="index.php"><div class="error-back"></div></a>
        <div class="error-code">
            <div class="error-header">Error 300</div>
            <div class="error-info">You are not logged in.</div>
        </div>
    </div>
<?php
    }
?>
</body>
</html>
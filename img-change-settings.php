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
        <a href="profile-settings.php"><div class="back"></div></a>
        <div class="form">
            <form method="post">
                <div><input type="text" name="user_img" placeholder="Dodaj link do zdjęcia"></div>
                <input type="submit" value="Aktualizuj zdjęcie!" name="button" class="update-button">
            </form>
        </div>
    </div>
<?php
    if(isset($_POST['user_img'])) {

        require('connect.php');
    
        $user_img=$_POST['user_img'];

        $query = "update users set user_img='{$user_img}' where user_id={$_SESSION['user_id']}";
        
        $_SESSION['user_img'] = $user_img;
        
        $result = mysqli_query($connection,$query);

        if($result) {
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
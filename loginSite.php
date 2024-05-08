<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisularest - Logowanie</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="form-area">
        <div class="form">
            <a href="index.php"><div class="back"></div></a>
            <div class="form-logo"><img src="grafika/logo.png" alt=""></div>
            <div class="welcome-title">Witaj na Pisulareście</div>

            <form action="login.php" method="post">
                <input type="text" name="login" placeholder="Login"><br>
                <input type="password" name="passw" placeholder="Haslo"><br>
            <input type="submit" value="Zaloguj" name="button" class="register-button">
            </form>
            <?php
            if(isset($_GET['status']))
            {
            if($_GET['status']=="ok_login")
            echo "Udalo sie zalogowac";
            if($_GET['status']=="error_login")
            echo "Nie udalo sie zalogowac";
            if($_GET['status']=="info")
            echo "Nie wypelniono pola";
            }
            ?>
            <div class="form-info">Kontynuując, wyrażasz zgodę na warunki opisane w dokumencie <a href="Pisularest-TermsOfUse.php">Warunki korzystania z serwisu</a> i potwierdzasz zapoznanie się z dokumentem <a href="Pisularest-PrivacyPolicy.php">Polityka Prywatności</a> Pisularesta</div>
            <div class="login-link"><a href="index.php?page=register">Nie ma cię jeszcze na Pisulareście? Dołącz do nas</a></div>
        </div>
    </div>

</body>
</html>
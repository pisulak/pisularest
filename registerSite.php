<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisularest - rejstracja</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="form-area">
        <div class="form">
        <a href="index.php"><div class="back"></div></a>
            <div class="form-logo"><img src="grafika/logo.png" alt=""></div>
            <div class="welcome-title">Witaj na Pisulareście</div>
            <div class="welcome-text">Znajdź nowe pomysły do wypróbowania</div>

            <form action="save_user.php" method="post">
            <input type="text" name="name" placeholder="Twoje imię"><br>
            <input type="text" name="login" placeholder="Twój login"><br>
            <input type="password" name="passw" placeholder="Utwórz hasło"><br>
            <input type="submit" value="Kontynuuj" name="button" class="register-button">
            </form>
            <?php
                if(isset($_GET['status']))
                {
                if($_GET['status']=="ok")
                echo "Udalo sie";
                if($_GET['status']=="error")
                echo "Nie udalo sie";
                if($_GET['status']=="info")
                echo "Nie wypelniono pola";
                }
            ?>
            <div class="form-info">Kontynuując, wyrażasz zgodę na warunki opisane w dokumencie <a href="Pisularest-TermsOfUse.php">Warunki korzystania z serwisu</a> i potwierdzasz zapoznanie się z dokumentem <a href="Pisularest-PrivacyPolicy.php">Polityka Prywatności</a> Pisularesta</div>
            <div class="login-link"><a href="index.php?page=login">Masz już konto? Zaloguj się</a></div>
            <div class="register-info">Pamiętaj że konto jest darmowe!</div>
        </div>
    </div>

</body>
</html>
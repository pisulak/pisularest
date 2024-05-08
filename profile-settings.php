<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisularest - profil</title>
    <link rel="stylesheet" href="style-profile.css">
    <link rel="stylesheet" href="style-error.css">
	<link rel="shortcut icon" href="grafika/logo-white.png"/>
</head>
<body>

    <?php
        session_start();

        if(isset($_SESSION['login'])) {
    ?>
    <div class="menu">
        <div class="logo-button">
            <a href="index-main.php"><div class="logo"><img src="grafika/logo.png" alt=""><span class="logo-text">Pisularest</span></div></a>
            <a href="index-main.php"><div class="main-button">Strona główna</div></a>
        </div>
        <div class="menu-items">
            <a href="show-profile.php">
                <div class="menu-item menu-item-1">
                    <div class="item1-back">
                        <?php
                            if(!empty($_SESSION['user_img']))
                            echo "<img src='{$_SESSION['user_img']}'>";
                            else
                                echo "<img src='grafika/user.png'>";
                        ?>
                    </div>
                </div>
            </a>
                <div class="menu-item menu-item-2">
                    <button></button>
                    <div class="dropdown">
                        Obecnie na koncie:
                        <div class="account-info">
                            <div class="account-img">
                                <?php
                                    if(!empty($_SESSION['user_img']))
                                    echo "<img src='{$_SESSION['user_img']}'>";
                                    else
                                    echo "<img src='grafika/user.png'>";
                                ?>
                            </div>
                            <div class="account-subinfo">
                                <div class="account-name">
                                    <?php
                                        echo "Imię: {$_SESSION['name']}";
                                    ?>
                                </div>
                                <div class="account-login">
                                    <?php
                                        echo "Login: {$_SESSION['login']}";
                                    ?>
                                </div>
                                <div class="account-rank">
                                    <?php
                                        if($_SESSION['rank']==5)
                                        echo "Ranga: Administrator";
                                        if($_SESSION['rank']==1)
                                        echo "Ranga: Użytkownik";
                                    ?>
                                </div>
                            </div>
                        </div>
                        <ul>
                            <li><a href="show-profile.php">Podgląd profilu</a></li>
                            <li><a href="profile-settings.php">Ustawienia profilu</a></li>
                            <li><a href="index-main.php?page=AddPost">Dodaj post</a></li>
                            <li><a href="index.php">Wyloguj</a></li>
                        </ul>
                    </div>
                </div>
        </div>
    </div>

    <?php
        if(isset($_GET['page'])) {
            if($_GET['page']=='imgChange') {
                include('img-change-settings.php');
            }
            if($_GET['page']=='infoChange') {
                include('profile-info-change.php');
            }
        }
    ?>

    <div class="container">
        <div class="profile-info">
            <div class="title">Twój profil</div>
            <div class="profile-img">
                <?php
                    if(!empty($_SESSION['user_img']))
                    echo "<img src='{$_SESSION['user_img']}'>";
                    else
                    echo "<img src='grafika/user.png'>";
                ?>
                <div><a href="profile-settings.php?page=imgChange">zmień zdjęcie profilu</a></div>
            </div>
            <div class="profile-name">
                <span class="subtitle">Imię:</span>
                <?php
                    echo "{$_SESSION['name']}";
                ?>
            </div>
            <div class="profile-login">
                <span class="subtitle">Login:</span>
                <?php
                    echo "{$_SESSION['login']}";
                ?>
            </div>
            <div class="profile-rank">
                <span class="subtitle">Ranga:</span>
                <?php
                    if($_SESSION['rank']==5)
                    echo "Administrator";
                    if($_SESSION['rank']==1)
                    echo "Użytkownik";
                ?>
            </div>
            <div class="info-change"><a href="profile-settings.php?page=infoChange">zmień swoje dane</a></div>
        </div>
    </div>
    
    <?php
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
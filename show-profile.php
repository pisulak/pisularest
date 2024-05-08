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
                include('img-change.php');
            }
        }
    ?>

    <div class="container">
        <div class="profile-info">
            <div class="profile-img">
                <?php
                    if(!empty($_SESSION['user_img']))
                    echo "<img src='{$_SESSION['user_img']}'>";
                    else
                    echo "<img src='grafika/user.png'>";
                ?>
                <div><a href="show-profile.php?page=imgChange">zmień zdjęcie profilu</a></div>
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
        </div>

        <div class="articles">
            <div class="title">Twoje posty</div>
            <?php
                require('connect.php');

                $query = "SELECT id, jpg, title, author, description, if(year(now())-year(upload_date)>1, concat(year(now())-year(upload_date), ' lat(a) temu'), concat(year(now())-year(upload_date), ' rok temu')) as 'data dodania' FROM article where author='{$_SESSION['login']}' and if(year(now())-year(upload_date)>0, year(now())-year(upload_date), '') UNION SELECT id, jpg, title, author, description, if(month(now())-month(upload_date)>1, concat(month(now())-month(upload_date), ' miesiace(y) temu'), concat(month(now())-month(upload_date), ' miesiac temu')) as 'data dodania' FROM article where author='{$_SESSION['login']}' and if(year(now())-year(upload_date)=0, month(now())-month(upload_date), '') UNION SELECT id, jpg, title, author, description, if(day(now())-day(upload_date)>1, concat(day(now())-day(upload_date), ' dni temu'), concat(day(now())-day(upload_date), ' dzień temu')) as 'data dodania' FROM article where author='{$_SESSION['login']}' and if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0, day(now())-day(upload_date), '') UNION SELECT id, jpg, title, author, description, if(hour(CURRENT_TIME())-hour(upload_time)>1, concat(hour(CURRENT_TIME())-hour(upload_time), ' godzin(y) temu'), concat(hour(CURRENT_TIME())-hour(upload_time), ' godzinę temu')) as 'data dodania' FROM article where author='{$_SESSION['login']}' and if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0 and day(now())-day(upload_date)=0 and hour(CURRENT_TIME())-hour(upload_time)>0, hour(CURRENT_TIME())-hour(upload_time), '') UNION SELECT id, jpg, title, author, description, if(minute(CURRENT_TIME())-minute(upload_time)>1, concat(minute(CURRENT_TIME())-minute(upload_time), ' minut(y) temu'), concat(minute(CURRENT_TIME())-minute(upload_time), ' minutę temu')) as 'data dodania' FROM article where author='{$_SESSION['login']}' and if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0 and day(now())-day(upload_date)=0 and hour(CURRENT_TIME())-hour(upload_time)=0, minute(CURRENT_TIME())-minute(upload_time), '') UNION SELECT id, jpg, title, author, description, if(second(CURRENT_TIME())-second(upload_time)>1, concat(second(CURRENT_TIME())-second(upload_time), ' sekund(y) temu'), concat(second(CURRENT_TIME())-second(upload_time), ' sekundę temu')) as 'data dodania' FROM article where author='{$_SESSION['login']}' and if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0 and day(now())-day(upload_date)=0 and hour(CURRENT_TIME())-hour(upload_time)=0 and minute(CURRENT_TIME())-minute(upload_time)=0, second(CURRENT_TIME())-second(upload_time), '')";

                $i=0;
                $col1='';
                $col2='';
                $col3='';
                $col4='';

                $result = mysqli_query($connection, $query);

                if($result) {
                    while($row = mysqli_fetch_assoc($result)) {

                        $i++;
                        if($i==1) {
                            $col1.="<div class=\"post\">";
                            $col1.="<div class=\"transparent-back\"></div><img src=\"{$row['jpg']}\" class=\"post-photo\"><div class=\"post-title-author\"><div class=\"post-title\">{$row['title']}</div><div class=\"post-author\">by {$row['author']}</div></div><div class=\"post-description\">{$row['description']}<br>{$row['data dodania']}</div>";

                            if($row['author']==$_SESSION['login'] || $_SESSION['rank']==5) {
                                $col1.="<a href=\"delete.php?id={$row['id']}\"><div class=\"delete-button\"></div></a><a href=\"edit.php?id={$row['id']}\"><div class=\"edit-button\"></div></a></div>";
                            }
                            else
                                $col1.="</div>";
                        }
                        if($i==2) {
                            $col2.="<div class=\"post\">";
                            $col2.="<div class=\"transparent-back\"></div><img src=\"{$row['jpg']}\" class=\"post-photo\"><div class=\"post-title-author\"><div class=\"post-title\">{$row['title']}</div><div class=\"post-author\">by {$row['author']}</div></div><div class=\"post-description\">{$row['description']}<br>{$row['data dodania']}</div>";

                            if($row['author']==$_SESSION['login'] || $_SESSION['rank']==5) {
                                $col2.="<a href=\"delete.php?id={$row['id']}\"><div class=\"delete-button\"></div></a><a href=\"edit.php?id={$row['id']}\"><div class=\"edit-button\"></div></a></div>";
                            }
                            else
                                $col2.="</div>";
                        }
                        if($i==3) {
                            $col3.="<div class=\"post\">";
                            $col3.="<div class=\"transparent-back\"></div><img src=\"{$row['jpg']}\" class=\"post-photo\"><div class=\"post-title-author\"><div class=\"post-title\">{$row['title']}</div><div class=\"post-author\">by {$row['author']}</div></div><div class=\"post-description\">{$row['description']}<br>{$row['data dodania']}</div>";

                            if($row['author']==$_SESSION['login'] || $_SESSION['rank']==5) {
                                $col3.="<a href=\"delete.php?id={$row['id']}\"><div class=\"delete-button\"></div></a><a href=\"edit.php?id={$row['id']}\"><div class=\"edit-button\"></div></a></div>";
                            }
                            else
                                $col3.="</div>";
                        }
                        if($i==4) {
                            $col4.="<div class=\"post\">";
                            $col4.="<div class=\"transparent-back\"></div><img src=\"{$row['jpg']}\" class=\"post-photo\"><div class=\"post-title-author\"><div class=\"post-title\">{$row['title']}</div><div class=\"post-author\">by {$row['author']}</div></div><div class=\"post-description\">{$row['description']}<br>{$row['data dodania']}</div>";

                            if($row['author']==$_SESSION['login'] || $_SESSION['rank']==5) {
                                $col4.="<a href=\"delete.php?id={$row['id']}\"><div class=\"delete-button\"></div></a><a href=\"edit.php?id={$row['id']}\"><div class=\"edit-button\"></div></a></div>";
                            }
                            else
                                $col4.="</div>";
                        }
                        if($i%4==0) {
                            $i=0;
                        }
                    }
                    echo "<div class='grid-container'>
                    <div class='grid-element-1'>{$col1}</div>
                    <div class='grid-element-2'>{$col2}</div>
                    <div class='grid-element-3'>{$col3}</div>
                    <div class='grid-element-4'>{$col4}</div>
                    </div>";
                }

                mysqli_close($connection);
                ?>
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
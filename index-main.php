<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisularest</title>
    <link rel="stylesheet" href="style-main.css">
    <link rel="stylesheet" href="style-error.css">
	<link rel="shortcut icon" href="grafika/logo-white.png"/>
</head>
<body>

    <?php
        session_start();

        if(isset($_SESSION['login'])) {
    ?>
    
    <div class="menu">
        <a href="index-main.php"><div class="logo"><img src="grafika/logo.png" alt=""><span class="logo-text">Pisularest</span></div></a>
        <a href="index-main.php"><div class="main-button">Strona główna</div></a>
        <label class="searchbar"><img src="grafika/search.png" alt=""><form method="post"><input type="text" name="searchbar" class="input-searchbar" placeholder="Szukaj"></form></label>
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
                            <div class="profile-img">
                                <?php
                                    if(!empty($_SESSION['user_img']))
                                    echo "<img src='{$_SESSION['user_img']}'>";
                                    else
                                    echo "<img src='grafika/user.png'>";
                                ?>
                            </div>
                            <div class="account-subinfo">
                                <div class="profile-name">
                                    <?php
                                        echo "Imię: {$_SESSION['name']}";
                                    ?>
                                </div>
                                <div class="profile-login">
                                    <?php
                                        echo "Login: {$_SESSION['login']}";
                                    ?>
                                </div>
                                <div class="profile-rank">
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
            if($_GET['page']=='AddPost') {
                include('save-post.php');
            }
        }
    ?>

    <div class="container">
        <?php
            require('connect.php');

            if(isset($_POST['searchbar'])) {
                $searchQuery=$_POST['searchbar'];

                $year="title like '%$searchQuery%' and if(year(now())-year(upload_date)>0, year(now())-year(upload_date), '')";
                $month="title like '%$searchQuery%' and if(year(now())-year(upload_date)=0, month(now())-month(upload_date), '')";
                $day="title like '%$searchQuery%' and if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0, day(now())-day(upload_date), '')";
                $hour="title like '%$searchQuery%' and if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0 and day(now())-day(upload_date)=0 and hour(CURRENT_TIME())-hour(upload_time)>0, hour(CURRENT_TIME())-hour(upload_time), '')";
                $minute="title like '%$searchQuery%' and if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0 and day(now())-day(upload_date)=0 and hour(CURRENT_TIME())-hour(upload_time)=0, minute(CURRENT_TIME())-minute(upload_time), '')";
                $second="title like '%$searchQuery%' and if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0 and day(now())-day(upload_date)=0 and hour(CURRENT_TIME())-hour(upload_time)=0 and minute(CURRENT_TIME())-minute(upload_time)=0, second(CURRENT_TIME())-second(upload_time), '')";
            }
            else {
                $year="if(year(now())-year(upload_date)>0, year(now())-year(upload_date), '')";
                $month="if(year(now())-year(upload_date)=0, month(now())-month(upload_date), '')";
                $day="if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0, day(now())-day(upload_date), '')";
                $hour="if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0 and day(now())-day(upload_date)=0 and hour(CURRENT_TIME())-hour(upload_time)>0, hour(CURRENT_TIME())-hour(upload_time), '')";
                $minute="if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0 and day(now())-day(upload_date)=0 and hour(CURRENT_TIME())-hour(upload_time)=0, minute(CURRENT_TIME())-minute(upload_time), '')";
                $second="if(year(now())-year(upload_date)=0 and month(now())-month(upload_date)=0 and day(now())-day(upload_date)=0 and hour(CURRENT_TIME())-hour(upload_time)=0 and minute(CURRENT_TIME())-minute(upload_time)=0, second(CURRENT_TIME())-second(upload_time), '')";
            }

            $query = "SELECT id, jpg, title, author, description, if(year(now())-year(upload_date)>1, concat(year(now())-year(upload_date), ' lat(a) temu'), concat(year(now())-year(upload_date), ' rok temu')) as 'data dodania' FROM article where $year UNION SELECT id, jpg, title, author, description, if(month(now())-month(upload_date)>1, concat(month(now())-month(upload_date), ' miesiace(y) temu'), concat(month(now())-month(upload_date), ' miesiac temu')) as 'data dodania' FROM article where $month UNION SELECT id, jpg, title, author, description, if(day(now())-day(upload_date)>1, concat(day(now())-day(upload_date), ' dni temu'), concat(day(now())-day(upload_date), ' dzień temu')) as 'data dodania' FROM article where $day UNION SELECT id, jpg, title, author, description, if(hour(CURRENT_TIME())-hour(upload_time)>1, concat(hour(CURRENT_TIME())-hour(upload_time), ' godzin(y) temu'), concat(hour(CURRENT_TIME())-hour(upload_time), ' godzinę temu')) as 'data dodania' FROM article where $hour UNION SELECT id, jpg, title, author, description, if(minute(CURRENT_TIME())-minute(upload_time)>1, concat(minute(CURRENT_TIME())-minute(upload_time), ' minut(y) temu'), concat(minute(CURRENT_TIME())-minute(upload_time), ' minutę temu')) as 'data dodania' FROM article where $minute UNION SELECT id, jpg, title, author, description, if(second(CURRENT_TIME())-second(upload_time)>1, concat(second(CURRENT_TIME())-second(upload_time), ' sekund(y) temu'), concat(second(CURRENT_TIME())-second(upload_time), ' sekundę temu')) as 'data dodania' FROM article where $second";

            $i=0;
            $col1='';
            $col2='';
            $col3='';
            $col4='';
            $col5='';
            $col6='';

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
                    if($i==5) {
                        $col5.="<div class=\"post\">";
                        $col5.="<div class=\"transparent-back\"></div><img src=\"{$row['jpg']}\" class=\"post-photo\"><div class=\"post-title-author\"><div class=\"post-title\">{$row['title']}</div><div class=\"post-author\">by {$row['author']}</div></div><div class=\"post-description\">{$row['description']}<br>{$row['data dodania']}</div>";

                        if($row['author']==$_SESSION['login'] || $_SESSION['rank']==5) {
                            $col5.="<a href=\"delete.php?id={$row['id']}\"><div class=\"delete-button\"></div></a><a href=\"edit.php?id={$row['id']}\"><div class=\"edit-button\"></div></a></div>";
                        }
                        else
                            $col5.="</div>";
                    }
                    if($i==6) {
                        $col6.="<div class=\"post\">";
                        $col6.="<div class=\"transparent-back\"></div><img src=\"{$row['jpg']}\" class=\"post-photo\"><div class=\"post-title-author\"><div class=\"post-title\">{$row['title']}</div><div class=\"post-author\">by {$row['author']}</div></div><div class=\"post-description\">{$row['description']}<br>{$row['data dodania']}</div>";

                        if($row['author']==$_SESSION['login'] || $_SESSION['rank']==5) {
                            $col6.="<a href=\"delete.php?id={$row['id']}\"><div class=\"delete-button\"></div></a><a href=\"edit.php?id={$row['id']}\"><div class=\"edit-button\"></div></a></div>";
                        }
                        else
                            $col6.="</div>";
                    }
                    if($i%6==0) {
                        $i=0;
                    }
                }
                echo "<div class='grid-container'>
                <div class='grid-element-1'>{$col1}</div>
                <div class='grid-element-2'>{$col2}</div>
                <div class='grid-element-3'>{$col3}</div>
                <div class='grid-element-4'>{$col4}</div>
                <div class='grid-element-5'>{$col5}</div>
                <div class='grid-element-6'>{$col6}</div>
                </div>";
            }

            mysqli_close($connection);
        ?>
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
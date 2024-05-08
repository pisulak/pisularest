<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisularest</title>
    <script src="slideshow.js" defer></script>
    <link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" href="grafika/logo-white.png"/>
</head>
<body>
    
    <div class="menu">
        <div class="logo"><img src="grafika/logo.png" alt=""><span class="logo-text">Pisularest</span></div>
        <div class="menu-items">
            <div class="menu-item menu-item-1"><a href="index.php?page=info">Informacje</a></div>
            <div class="menu-item menu-item-2"><a href="https://business.pinterest.com/en/">Dla firm</a></div>
            <div class="menu-item menu-item-3"><a href="https://newsroom.pinterest.com/en">Blog</a></div>
            <a href="index.php?page=login"><div class="menu-item menu-item-4">Zaloguj się</div></a>
            <a href="index.php?page=register"><div class="menu-item menu-item-5">Zarejestruj się</div></a>
        </div>
    </div>

    <?php

        session_start();

        session_destroy();

        if(isset($_GET['page'])) {
            if($_GET['page']=='info') {
                include('info.php');
            }
            if($_GET['page']=='login') {
                include('loginSite.php');
            }
            if($_GET['page']=='register') {
                include('registerSite.php');
            }
        }
    ?>
    
    <div class="slideshow">
        <div class="fade"><img src="grafika/fade.png" alt=""></div>
        <div class="main-title">Znajdź kolejne</div>
        <span class="dots first" onclick="currentDiv(1)"></span>
        <span class="dots second" onclick="currentDiv(2)"></span>
        <span class="dots third" onclick="currentDiv(3)"></span>
        <span class="dots fourth" onclick="currentDiv(4)"></span>
        <div class="content">
            <div class="header header-first">inspiracje sportowe</div>
                <div class="grid-container">
                    <div class="grid-item grid-item-1"></div>
                    <div class="grid-item grid-item-2"></div>
                    <div class="grid-item grid-item-3"></div>
                    <div class="grid-item grid-item-4"></div>
                    <div class="grid-item grid-item-5"></div>
                    <div class="grid-item grid-item-6"></div>
                    <div class="grid-item grid-item-7"></div>
                    <div class="grid-item grid-item-8"></div>
                    <div class="grid-item grid-item-9"></div>
                    <div class="grid-item grid-item-10"></div>
                    <div class="grid-item grid-item-11"></div>
                    <div class="grid-item grid-item-12"></div>
                    <div class="grid-item grid-item-13"></div>
                    <div class="grid-item grid-item-14"></div>
                </div>
        </div>
        <div class="content">
            <div class="header header-second">inspiracje motoryzacyjne</div>
                <div class="grid-container">
                    <div class="grid-item grid-item-1"></div>
                    <div class="grid-item grid-item-2"></div>
                    <div class="grid-item grid-item-3"></div>
                    <div class="grid-item grid-item-4"></div>
                    <div class="grid-item grid-item-5"></div>
                    <div class="grid-item grid-item-6"></div>
                    <div class="grid-item grid-item-7"></div>
                    <div class="grid-item grid-item-8"></div>
                    <div class="grid-item grid-item-9"></div>
                    <div class="grid-item grid-item-10"></div>
                    <div class="grid-item grid-item-11"></div>
                    <div class="grid-item grid-item-12"></div>
                    <div class="grid-item grid-item-13"></div>
                    <div class="grid-item grid-item-14"></div>
                </div>
        </div>
        <div class="content">
            <div class="header header-third">inspiracje muzyczne</div>
                <div class="grid-container">
                    <div class="grid-item grid-item-1"></div>
                    <div class="grid-item grid-item-2"></div>
                    <div class="grid-item grid-item-3"></div>
                    <div class="grid-item grid-item-4"></div>
                    <div class="grid-item grid-item-5"></div>
                    <div class="grid-item grid-item-6"></div>
                    <div class="grid-item grid-item-7"></div>
                    <div class="grid-item grid-item-8"></div>
                    <div class="grid-item grid-item-9"></div>
                    <div class="grid-item grid-item-10"></div>
                    <div class="grid-item grid-item-11"></div>
                    <div class="grid-item grid-item-12"></div>
                    <div class="grid-item grid-item-13"></div>
                    <div class="grid-item grid-item-14"></div>
                </div>
        </div>
        <div class="content">
            <div class="header header-fourth">inspiracje na tatuaże</div>
                <div class="grid-container">
                    <div class="grid-item grid-item-1"></div>
                    <div class="grid-item grid-item-2"></div>
                    <div class="grid-item grid-item-3"></div>
                    <div class="grid-item grid-item-4"></div>
                    <div class="grid-item grid-item-5"></div>
                    <div class="grid-item grid-item-6"></div>
                    <div class="grid-item grid-item-7"></div>
                    <div class="grid-item grid-item-8"></div>
                    <div class="grid-item grid-item-9"></div>
                    <div class="grid-item grid-item-10"></div>
                    <div class="grid-item grid-item-11"></div>
                    <div class="grid-item grid-item-12"></div>
                    <div class="grid-item grid-item-13"></div>
                    <div class="grid-item grid-item-14"></div>
                </div>
        </div>
    </div>

</body>
</html>
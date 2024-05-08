<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisularest - informacje</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="style_tou_pp.css">
</head>
<body>
    
    <div class="form-area">
        <div class="form">
            <a href="index.php"><div class="back2"></div></a>
            <div class="form-logo"><img src="grafika/logo.png" alt=""></div>
            <div class="welcome-title">Pisularet - informacje</div>
            <div class="columns">
                <div><a href="Pisularest-TermsOfUse.php">Warunki korzystania z serwisu</a></div>
                <div><a href="Pisularest-PrivacyPolicy.php">Polityka prywatności</a></div>
            </div>

            <?php
                if(isset($_GET['subpage'])) {
                    if($_GET['subpage']=='Pisularest-TermsOfUse') {
                        include('Pisularest-TermsOfUse.php');
                    }
                    if($_GET['subpage']=='Pisularest-PrivacyPolicy') {
                        include('Pisularest-PrivacyPolicy.php');
                    }
                }
            ?>
        </div>
    </div>

</body>
</html>
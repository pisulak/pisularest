<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisularest</title>
    <link rel="stylesheet" href="style-save-edit.css">
    <link rel="stylesheet" href="style-error.css">
	<link rel="shortcut icon" href="grafika/logo-white.png"/>
</head>
<body>

    <?php
        if(isset($_SESSION['login'])) {
    ?>

    <div class="form-area">
        <div class="forms">
            <a href="index-main.php"><div class="back2"></div></a>
            <div class="form-1">
                <div class="header">Dodaj swój post</div>
                <div class="caption">(zdjęcie jako link)</div>
                <form action="save.php" method="post">
                    <div><input type="text" name="jpg" placeholder="Tu wklej link do zdjęcia*"></div>
                    <div><input type="text" name="title" placeholder="Dodaj tytuł do obrazka*"></div>
                    <div><input type="text" name="description" placeholder="Dodaj opis"></div>
                    <div class="info">*wymagane</div>
                    <input type="submit" value="Dodaj post!" name="button" class="add-button">
                </form>
            </div>
            <div class="form-2">
                <div class="header">Dodaj swój post</div>
                <div class="caption">(zdjęcie jako plik)</div>
                <form action="save.php" method="post">
                    <div><input type="file" name="jpg2" disabled="disabled" accept="image/*" class="file-input"></div>
                    <div><input type="text" name="title2" disabled="disabled" placeholder="Dodaj tytuł do obrazka*"></div>
                    <div><input type="text" name="description2" disabled="disabled" placeholder="Dodaj opis"></div>
                    <div class="info">*wymagane</div>
                    <input type="submit" value="Dodaj post!" disabled="disabled" name="button" class="add-button">
                </form>
            </div>
        </div>
    </div>

<?php
    if(isset($_GET['status']))
    {
    if($_GET['status']=="ok")
    echo "Udalo sie";
    if($_GET['status']=="error")
    echo "Nie udalo sie";
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
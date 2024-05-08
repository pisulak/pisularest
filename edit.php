<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pisularest - edycja postu</title>
    <link rel="stylesheet" href="style-save-edit.css">
    <link rel="stylesheet" href="style-error.css">
	<link rel="shortcut icon" href="grafika/logo-white.png"/>
</head>
<body>

    <?php
        session_start();

        if(isset($_SESSION['login'])) {
    ?>

    <div class="form-area">
        <a href="index-main.php"><div class="back"></div></a>
        <div class="form">
            <form method="post">
                <div><input type="text" name="title" placeholder="Zmień tytuł obrazka"></div>
                <div><input type="text" name="description" placeholder="Dodaj/Zmień opis"></div>
                <input type="submit" value="Aktualizuj!" name="button" class="update-button">
            </form>
        </div>
    </div>
<?php
    if(isset($_GET['id']) && isset($_POST['title']) && isset($_POST['description']) && is_numeric($_GET['id'])) {
    
        $id=$_GET['id'];
        $id=htmlentities($id);

        $title=$_POST['title'];
        $title=htmlentities($title);

        $description=$_POST['description'];
        $description=htmlentities($description);

        require('connect.php');

        if(!empty($title) && !empty($description)) {
            $query = "update article set title='{$title}', description='{$description}' where id={$id}";
        }
        if(!empty($title) && empty($description)) {
            $query = "update article set title='{$title}' where id={$id}";
        }
        if(empty($title) && !empty($description)) {
            $query = "update article set description='{$description}' where id={$id}";
        }
        $result = mysqli_query($connection,$query);

        if($result) {
            header("Location:index-main.php");
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
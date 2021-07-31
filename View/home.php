<?php
    error_reporting(E_ALL);
    include_once("../Controller/ControllerTweet.php");
    include_once("../Controller/ControllerUser.php");
    $connexion = new ControllerTweet();
    $infoTweet = $connexion->submit();
    $viewTweet = $connexion->displayAllTweet();
    $userCo = new UserControl();
    $userinfo = $userCo->GestionId();
    if (!isset($_SESSION['id'])) {
        header("Location: inscription.php");
    }
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Assets/CSS/main.css">
    <link rel="stylesheet" href="../Assets/CSS/header.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container-fluid p-0 m-0">
        <div class="row">
            <div class="col-xl-3 p-0 mx-auto">
                <nav class="nav p-3 flex-column vh-100 border-top border-right border-secondary bg-light theme-change">
                    <?php include "../View/nav.php"?>
                </nav>
            </div>
            <div class="col-xl-6 p-0 mx-auto imgbody" id="bartweet">
                <section class="w-auto vh-100 flex-column border-top border-secondary">
                    <header>
                        <nav class="navbar bg-light shadow-sm p-1 theme-change">
                            <a class="navbar-brand text-dark font-weight-bold" href="home.php"><img src="../Assets/img/logo.png" width="30" height="30" class="d-inline-block align-top" alt="Rettiwt">Acceuil</a>
                        </nav>
                    </header>
                    <?php include "../View/tweet.php"?>
                    <span class="text-warning">
                        <?php if (isset($infoTweet)) { echo $infoTweet; } ?>
                    </span>
                </section>
            </div>
            <div class="col-xl-3 p-0 imgtheme">
                <aside class="mx-auto mx-auto vh-100 flex-column">
                    <?php include "../View/themes.php"?>
                </aside>
            </div>
        </div>
    </div>
</body>
<script src="../Assets/JS/theme.js"></script>
<script src="../Assets/JS/textarea.js"></script>
<script src="https://kit.fontawesome.com/8e6d0b66fc.js" crossorigin="anonymous"></script>
</html>
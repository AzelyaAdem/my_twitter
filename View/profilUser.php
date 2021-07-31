<?php
    error_reporting(E_ALL);
    require_once("../Controller/ControllerUser.php");
    include_once("../Controller/ControllerTweet.php");
    $connexion = new ControllerTweet();
    $viewTweet = $connexion->displayTweet();
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
    <title>Profil</title>
    <link rel="stylesheet" href="../Assets/CSS/main.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body class="imgprofil">
    <div class="container-fluid shadow-sm">
        <div class="row">
            <div class="col-md-12 bg-light p-3 border-bottom border-dark theme-change">
                <a href="home.php"><i class="fas svg-color fa-arrow-left">Home</i></a>
                <span class="float-right font-weight-bold text-dark"><?php echo 'Compte de : ' . $userinfo['name']; ?></span>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 bg-secondary">
                <div class="text-center m-5">
                    Afficher la bannière et l'avatar ici ! (non implémentée car non incluse dans la base de donnée)
                    <span><?php echo $userinfo['avatar']; ?></span>
                    <span><?php echo $userinfo['banner']; ?></span>
                </div>
            </div>
        </div>
        <div class="row bg-light theme-change">
            <div class="col-md-10 editmarg">
                <span class="font-weight-bold text-dark"><?php echo $userinfo['name'];?></span>
                <span class="font-italic font-weight-lighter text-dark"><?php echo '@'.$userinfo['username']; ?></span>
                <span class="text-dark"><?php echo $userinfo['biography'];?></span>
                <div class="w-100"></div>
                <span class="font-italic font-weight-lighter text-dark">
                    <i class="fas fa-map-marked-alt mx-2"></i><?php echo $userinfo['city'];?><?php echo', ' . $userinfo['country'];?>
                </span>
                <span class="font-italic font-weight-lighter text-dark">
                    <i class="fas fa-link mx-2"></i><?php echo $userinfo['website'];?>
                </span>
                <span class="font-italic font-weight-lighter text-dark">
                    <i class="fas fa-birthday-cake mx-2"></i><?php echo 'date de naissance : ' . $userinfo['dob'];?>
                </span>
                <span class="font-italic font-weight-lighter text-dark">
                    <i class="far fa-calendar-alt mx-2"></i><?php echo 'date dernière mise à jour : ' . $userinfo['created_at'];?>
                </span>
            </div>
            <div class="col-md-2 bg-light theme-change">
                <button type="button" class="btn rounded-pill btn-outline-dark m-2 float-right"><a href="editionUser.php">Edit profile</button></a>
                <button type="button" class="btn rounded-pill btn-outline-dark m-2 float-right"><a href="home.php">Home</button></a>
            </div>
        </div>
    </div>
    <form method="POST" action="profilUser.php">
        <table>
            <?php foreach($viewTweet as $key => $value) {?>
                <tr>
                    <td>
                        <h4><?= $userinfo['avatar'] . $userinfo['name']?><span><?='@'.$userinfo['username'] . $viewTweet[$key]['created_at'];?></span></h4>
                        <p><?= $viewTweet[$key]['body'];?></p><br>
                    </td>
                </tr>
            <?php }?>
        </table>
    </form>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
<?php
    error_reporting(E_ALL);
    include_once("../Controller/ControllerUser.php");
    $connexion = new UserControl();
    $erreur = $connexion->inscription();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tweet academie</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/CSS/main.css">
</head>
<body class="bg-dark">
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="d-flex col-md-12 w-100 align-items-center bg-black">
                <div class="m-auto text-size shadow-text text-white">
                    <div class="d-block shadow-sm bg-primary border-bottom border-primary border-white border-dark p-5 bg-grid rounded-sm">
                        <form method="POST" action="inscription.php">
                            <div class="form-group">
                                <h2 class="text-center">Créer votre compte</h2><hr>
                                <div class="row">
                                    <div class="col-md-6">
                                        <label for="fullname" class="text-sm">Nom et prénom</label>
                                        <input type="text" class="form-control" placeholder="Votre fullname" name="fullname" id="fullname" value="
                                        <?php if (isset($_POST["fullname"])) {
                                            echo $_POST["fullname"];
                                        }?>">
                                        <label for="username">Username</label>
                                        <input class="form-control" type="text" placeholder="Votre username" name="username" id="username" value="
                                        <?php if (isset($_POST["username"])) {
                                            echo $_POST["username"];
                                        }?>">
                                        <label for="e-mail">Email :</label>
                                        <input type="email" class="form-control" placeholder="Votre email" name="mail" id="e-mail" value="
                                        <?php if (isset($_POST["mail"])) {
                                            echo $_POST["mail"];
                                        }?>">
                                        <label for="e-mail2">Confirmation du email :</label>
                                        <input type="email" class="form-control" placeholder="Confirmer votre email" name="mail2" id="e-mail2" value="
                                        <?php if (isset($_POST["mail2"])) {
                                            echo $_POST["mail2"];
                                        }?>">
                                        <label for="mdp">Mot de passe :</label>
                                        <input type="password" class="form-control" placeholder="Votre mot de passe" name="mdp" id="mdp" value="
                                        <?php if (isset($_POST["mdp"])) {
                                            echo $_POST["mdp"];
                                        }?>">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="mdp2">Confirmation du mot de passe :</label>
                                        <input type="password" class="form-control" placeholder="Confirmer votre mot de passe" name="mdp2" id="mdp2" value="
                                        <?php if (isset($_POST["mdp2"])) {
                                            echo $_POST["mdp2"];
                                        }?>">
                                        <label for="phone">Votre numéro :</label>
                                        <input type="tel" class="form-control" placeholder="Votre numéro" name="phone" id="phone" value="
                                        <?php if (isset($_POST["phone"])) {
                                            echo $_POST["phone"];
                                        }?>">
                                        <label for="date_naissance">Date de naissance :</label>
                                        <input type="date" class="form-control" name="date_naissance" id="date_naissance" value="
                                        <?php if (isset($_POST["date_naissance"])) {
                                            echo $_POST["date_naissance"];
                                        }?>">
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="genre" id="size_1" value="homme" />
                                            <label class="form-check-label" for="size_1" class="genre">Homme</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="genre" id="size_2" value="femme" />
                                            <label class="form-check-label" for="size_2" class="genre">Femme</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="genre" id="size_3" value="autre" checked />
                                            <label class="form-check-label" for="size_3" class="genre">Autre</label>
                                        </div>
                                    </div>
                                </div>
                                <span class="text-warning">
                                    <?php if (isset($erreur)) {
                                        echo $erreur;
                                    }?>
                                </span>
                            </div>
                            <input type="submit" class="btn btn-primary" name="forminscription" value="Je m'inscris"><br><hr>
                            <a href="connexion.php">
                                <span class="text-white">Connectez-vous ici !</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
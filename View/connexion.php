<?php
    error_reporting(E_ALL);
    include_once("../Controller/ControllerUser.php");
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
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body class="bg-dark imgbody">
    <div class="container-fluid">
        <div class="row vh-100">
            <div class="d-flex col-md-12 w-100 align-items-center bg-black">
                <div class="m-auto text-size shadow-text text-white">
                    <div class="d-block shadow-sm bg-primary border-bottom border-primary border-white border-dark p-5 bg-grid rounded-sm">
                        <form method="POST" action="connexion.php">
                            <div class="form-group">
                                <h2 class="text-center">Se connecter à Twitter</h2><hr>
                                <label for="connect">Email ou nom d'utilisateur</label>
                                <input class="form-control" type="text" name="connect" id="connect"/>
                            </div>
                            <div class="form-group">
                                <label for="password">Mot de passe</label>
                                <input type="password" class="form-control" name="mdpconnect" id="password"/>
                            </div>
                            <span id="text-warning">
                                <?php $connexion = new UserControl();
                                if (null !== $connexion->connexionUser()) {
                                    echo $connexion->connexionUser();
                                }?>
                            </span>
                            <input type="submit" class="btn btn-primary" name="formconnexion" value="Se connecter"/><br><hr>
                            <a href="inscription.php">
                                <span class="text-white">Pas encore de compte ?</span>
                            </a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
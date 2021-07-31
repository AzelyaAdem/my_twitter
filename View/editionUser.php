<?php
    error_reporting(E_ALL);
    require_once("../Controller/ControllerUser.php");
    $connexion = new UserControl();
    $user = $connexion->data_member();
    $connexion->Edition();
    if (!isset($_SESSION['id'])) {
        header("Location: home2.php");
    }
?>
<head>
    <link rel="stylesheet" href="../Assets/CSS/inscriptionUser.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="../Assets/CSS/main.css">
    <title>Edition</title>
</head>
<body class="box imgedit">
    <div class="container-fluid">
        <div class="row">
            <h3 class="col-xl-12 text-center bg-primary editmarg">EDITION DE MON PROFIL</h3>
            <br>
            <div class="col-xl-3"></div>
            <form method="POST" action="editionUser.php" class="text-right col-xl-4 bg-primary marginedit">
                <div>
                    <label>Nom :</label>
                    <input type="text" name="newNom" placeholder="Fullname" value="<?php echo $user['fullname'];?>"/>
                </div>
                <div>
                    <label>Nom d'utilisateur :</label>
                    <input type="text" name="newUsername" placeholder="Username" value="<?php echo $user['username'];?>"/>
                </div>
                <div>
                    <label>Biographie :</label>
                    <input type="text" name="biography" placeholder="biography" value="<?php echo $user['biography'];?>"/>
                </div>
                <div>
                    <label>Ville :</label>
                    <input type="text" name="newVille" placeholder="Ville" value="<?php echo $user['ville'];?>"/>
                </div>
                <div>
                    <label>Pays :</label>
                    <input type="text" name="newPays" placeholder="Pays" value="<?php echo $user['pays'];?>"/>
                </div>
                <div>
                    <label>Email :</label>
                    <input type="text" name="newMail" placeholder="Mail" value="<?php echo $user['mail'];?>"/>
                </div>
                <div>
                    <label>Site Web :</label>
                    <input type="text" name="newUrl" placeholder="site web" value="<?php echo $user['site_web'];?>"/>
                </div>
                    <label>Telephone :</label>
                    <input type="text" name="newTel" placeholder="tel" value="<?php echo $user['tel'];?>"/>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="text-right col-md-4 bg-primary marginedit marginedit2">
                        <label for="date_naissance">Date de naissance :</label>
                        <input type="date" name="date_naissance" id="date_naissance" class="datenaissanceedit" value="<?php echo $user['date_naissance'];?>"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="text-right col-md-4 bg-primary">
                        <label>Mot de passe :</label>
                        <input type="password" name="newMdp" placeholder="Nouveau mot de passe"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="text-right col-md-4 bg-primary">
                        <label>Confirmation MDP :</label>        
                        <input type="password" name="newMdp2" placeholder="Confirmation du mot de passe"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="text-right col-md-4 bg-primary editmarg">
                        <input type="submit" value="Mettre à jour mon profil !" class="btn2"/>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-3"></div>
                    <div class="text-right col-md-4 bg-primary colorpourquitter">
                        <a href="../View/home.php" class=" colorpourquitter">Quitter sans sauvegarder !</a>
                    </div>
                </div>
            </form>
            <span id="alerte">
                <?php if (null !== $connexion->Edition()) { 
                    echo $connexion->Edition();
                }
                ?>
            </span>
        </div>
    </div>
</body>
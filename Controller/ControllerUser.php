<?php
session_start();
require_once "../Model/requeteUser.php";
require_once "../Model/database.php";
class UserControl {
    private $userModel;
    public function __construct() {
        $this->userModel = new requeteUser();
    }
    public function inscription() {
        if (isset($_POST['forminscription'])) {
            $pseudo = htmlspecialchars($_POST['fullname']) ?? null;
            $username = htmlspecialchars($_POST['username']) ?? null;
            $mail = htmlspecialchars($_POST['mail']) ?? null;
            $mail2 = htmlspecialchars($_POST['mail2']) ?? null;
            $salt = "vive le projet tweet_academy";
            $mdp = hash('ripemd160', $salt . $_POST['mdp']) ?? null;
            $phone = htmlspecialchars($_POST['phone']) ?? null;
            $date = htmlspecialchars($_POST['date_naissance']) ?? null;
            $genre = $_POST['genre'] ?? null;
            if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['date_naissance']) && isset($_POST['phone']) && isset($_POST['genre']) && isset($_POST['mail']) && isset($_POST['mail2']) && isset($_POST['mdp']) && isset($_POST['mdp2'])) {
                if (!empty($_POST['fullname']) && !empty($_POST['username']) && !empty($_POST['date_naissance']) && !empty($_POST['phone']) && !empty($_POST['genre']) && !empty($_POST['mail']) && !empty($_POST['mail2']) && !empty($_POST['mdp']) && !empty($_POST['mdp2'])) {
                    $pseudolength = strlen($pseudo);
                    $usernamelength = strlen($username);
                    $phonelength = strlen($phone);
                    $dateArray = explode('-', $date);
                    $dateBirth = (int) $dateArray[0];
                    $dateYear = (int) date("Y");
                    if ($pseudolength <= 50 && $pseudolength >= 3) {
                        if ($usernamelength >= 3 && $usernamelength <= 50) {
                            $usernameExist = $this->userModel->name($username);
                            if ($usernameExist == true) {
                                if ($phonelength <= 10 && $phonelength >= 10) {
                                    $phoneExist = $this->userModel->phone($phone);
                                    if ($phoneExist == true) {
                                        if ($dateYear - $dateBirth > 13) {
                                            if (filter_var($mail, FILTER_SANITIZE_EMAIL)) {
                                                if ($mail == $mail2) {
                                                    if (filter_var($mail, FILTER_VALIDATE_EMAIL)) {
                                                        $mailExist = $this->userModel->mail($mail);
                                                        if ($mailExist == true) {
                                                            if ($_POST['mdp'] == $_POST['mdp2']) {
                                                                $this->userModel->inscrit($mail, $pseudo, $username, $mdp, $date, $genre, $phone);
                                                                $userId = $this->userModel->getId($mail);
                                                                $_SESSION['id'] = $userId;
                                                                header("Location: ../View/profilUser.php?id=" . $_SESSION['id']);
                                                            }
                                                            else {
                                                                return "Vos mots de passe ne correspondent pas !";
                                                            }
                                                        } else {
                                                            return "Adresse mail déjà utilisée !";
                                                        }
                                                    } else {
                                                        return "Votre adresse mail n'est pas valide !";
                                                    }
                                                } else {
                                                    return "Vos adresses mail ne correspondent pas !";
                                                }
                                            } else {
                                                return "Veuillez saisir une adresse mail valide !";
                                            }
                                        } else {
                                            return "Vous devez avoir plus de 13 ans pour accéder au site !";
                                        }
                                    } else {
                                        return "Numéro déjà utilisée !";
                                    }
                                } else {
                                    return "Veuillez entrée un numéro de télephone à 10 chiffres !";
                                }
                            } else {
                                return "Username déjà utilisée !";
                            }
                        } else {
                            return "Votre username dois contenir minimum 3 caractères et ne dois pas dépassées 50 caractères !";
                        }
                    } else {
                        return "Votre nom dois faire minimum 3 caractère et ne dois pas dépassées 50 caractères !";
                    }
                } else {
                    return "Tous les champs doivent être complétés !";
                }
            }else {
                return "Tous les champs doivent être complétés !";
            }
        }
    }
    public function connexionUser() {
        if (isset($_POST['formconnexion'])) {
            $connect = htmlspecialchars($_POST['connect'] ?? null);
            $salt = "vive le projet tweet_academy";
            $mdpconnect = hash('ripemd160', $salt . $_POST['mdpconnect']);
            if (isset($connect) and isset($mdpconnect)) {
                if (!empty($connect) and !empty($mdpconnect)) {
                    $userExist = $this->userModel->connectUser($connect, $mdpconnect);
                    if ($userExist != false) {
                        $_SESSION['id'] = $userExist['id'];
                        header("Location: ../View/home.php?id=" . $_SESSION['id']);
                    }
                    else {
                        return "Mail ou mot de passe incorrect !";
                    }
                }
                else {
                    return "Tous les champs doivent être complétés !";
                }
            }
            else {
                return "Tous les champs doivent être complétés !";
            }
        }
    }
    public function GestionId() {
        if (isset($_POST['Deco'])) {
            session_start();
            session_destroy();
            header('Location: ../View/homeMain.php');
        }
        if (isset($_SESSION['id'])) {
            return $this->userModel->Gestion();
        }
    }
    public function data_member() {
        if (isset($_SESSION['id'])) {
            return $this->userModel->dataMembers();
        }
    }
    public function Edition() {
        if (isset($_SESSION['id'])) {
            $user = $this->userModel->sessionId();
            if (isset($_POST['newNom']) && !empty($_POST['newNom']) && $_POST['newNom'] != $user['fullname']) {
                $newNom = htmlspecialchars($_POST['newNom'] ?? null);
                $pseudolength = strlen($newNom);
                if ($pseudolength <= 50 && $pseudolength >= 3) {
                    $this->userModel->setFullname($newNom);
                    header("Location: profilUser.php?id=" . $_SESSION['id']);
                }
                else {
                    return "Votre nom dois faire minimum 3 caractère et ne dois pas dépassées 50 caractères !";
                }
            }
            if (isset($_POST['newUsername']) && !empty($_POST['newUsername']) && $_POST['newUsername'] != $user['username']) {
                $newUsername = htmlspecialchars($_POST['newUsername'] ?? null);
                $usernamelength = strlen($newUsername);
                if ($usernamelength >= 3 && $usernamelength <= 50) {
                    $userExist = $this->userModel->name($newUsername);
                    if ($userExist == true) {
                        $this->userModel->setUsername($newUsername);
                        header("Location: profilUser.php?id=" . $_SESSION['id']);
                    }
                    else {
                        return "Username déjà utilisée !";
                    }
                }
                else {
                    return "Votre username dois contenir minimum 3 caractères et ne dois pas dépassées 50 caractères !";
                }
            }
            if (isset($_POST['biography']) && !empty($_POST['biography']) && $_POST['biography'] != $user['biography']) {
                $newBio = htmlspecialchars($_POST['biography'] ?? null);
                $biolength = strlen($newBio);
                if ($biolength <= 50) {
                    $this->userModel->setBiography($newBio);
                    header("Location: profilUser.php?id=" . $_SESSION['id']);
                }
                else {
                    return "Votre biography ne dois pas faire plus de 50 caractères !";
                }
            }
            if (isset($_POST['newVille']) && !empty($_POST['newVille']) && $_POST['newVille'] != $user['ville']) {
                $newVille = htmlspecialchars($_POST['newVille'] ?? null);
                $this->userModel->setVille($newVille);
                header("Location: profilUser.php?id=" . $_SESSION['id']);
            }
            if (isset($_POST['newPays']) && !empty($_POST['newPays']) && $_POST['newPays'] != $user['pays']) {
                $newPays = htmlspecialchars($_POST['newPays'] ?? null);
                $this->userModel->setPays($newPays);
                header("Location: profilUser.php?id=" . $_SESSION['id']);
            }
            if (isset($_POST['newMail']) && !empty($_POST['newMail']) && $_POST['newMail'] != $user['mail']) {
                $newMail = htmlspecialchars($_POST['newMail'] ?? null);
                if (filter_var($newMail, FILTER_VALIDATE_EMAIL)) {
                    $mailExist = $this->userModel->mail($newMail);
                    if ($mailExist == true) {
                        $this->userModel->setEmail($newMail);
                        header("Location: profilUser.php?id=" . $_SESSION['id']);
                    }
                    else {
                        return "Votre email est déjà utiliser !";
                    }
                } else {
                    return "Votre adresse mail n'est pas valide !";
                }
            }
            if (isset($_POST['newUrl']) && !empty($_POST['newUrl']) && $_POST['newUrl'] != $user['site_web']) {
                $newUrl = htmlspecialchars($_POST['newUrl'] ?? null);
                if (filter_var($newUrl, FILTER_VALIDATE_URL)) {
                    $this->userModel->setUrlWeb($newUrl);
                    header("Location: profilUser.php?id=" . $_SESSION['id']);
                }
                else {
                    return "Veuillez rentrer une Url valide !";
                }
            }
            if (isset($_POST['newTel']) && !empty($_POST['newTel']) && $_POST['newTel'] != $user['tel']) {
                $newPhone = htmlspecialchars($_POST['newTel']) ?? null;
                $phonelength = strlen($newPhone);
                if ($phonelength <= 10 && $phonelength >= 10) {
                    $phoneExist = $this->userModel->phone($newPhone);
                    if ($phoneExist == true) {
                        $this->userModel->setTel($newPhone);
                        header("Location: profilUser.php?id=" . $_SESSION['id']);
                    }
                    else {
                        return "Votre numéro de téléphone est déjà utiliser !";
                    }
                }
                else {
                    return "Veuillez entrée un numéro de télephone à 10 chiffres !";
                }
            }
            if (isset($_POST['date_naissance']) && !empty($_POST['date_naissance']) && $_POST['date_naissance'] != $user['date_naissance']) {
                $newDate = htmlspecialchars($_POST['date_naissance']) ?? null;
                $dateArray = explode('-', $newDate);
                $dateBirth = (int) $dateArray[0];
                $dateYear = (int) date("Y");
                if ($dateYear - $dateBirth > 13) {
                    $this->userModel->setDate($newDate);
                    header("Location: profilUser.php?id=" . $_SESSION['id']);
                }
                else {
                    return "Vous devez avoir plus de 13 ans pour accéder au site !";
                }
            }
            if (isset($_POST['newMdp']) && !empty($_POST['newMdp']) && isset($_POST['newMdp2']) && !empty($_POST['newMdp2'])) {
                $salt = "vive le projet tweet_academy";
                $getMdp = hash('ripemd160', $salt . $_POST['newMdp']) ?? null;
                $mdp2 = hash('ripemd160', $salt . $_POST['newMdp2'] ?? null);
                if ($getMdp == $mdp2) {
                    $this->userModel->setMdp($getMdp);
                    header("Location: profilUser.php?id=" . $_SESSION['id']);
                }
                else {
                    return "Vos deux mots de passe ne correspondent pas !";
                }
            }
            else if (isset($_POST['newNom']) && $_POST['newNom'] == $user['fullname']) {
                header("Location: profilUser.php?id=" . $_SESSION['id']);
            }
        }
        else {
            header("location: connexionUser.php");
        }
    }
}
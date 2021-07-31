<?php
require_once "database.php";
class requeteUser extends Database {
    public function mail($mail) {
        $reqmail = $this->pdo->prepare("SELECT * FROM users WHERE email = :mail;");
        $reqmail->bindParam(':mail', $mail, PDO::PARAM_STR);
        $reqmail->execute();
        if ($reqmail->rowCount() == 0) {
            return true;
        }
        else {
            return false;
        }
    }
    public function inscrit($mail, $pseudo, $username, $mdp, $date, $genre, $phone) {     
        try {
            $insertmbr = $this->pdo->prepare("INSERT INTO users (email, name, username, password, dob, gender, telephone) VALUES(:mail, :fullname, :username, :passw, :date_naissance, :genre, :tel);");
            $insertmbr->bindParam(':mail', $mail, PDO::PARAM_STR);
            $insertmbr->bindParam(':fullname', $pseudo, PDO::PARAM_STR);
            $insertmbr->bindParam(':username', $username, PDO::PARAM_STR);
            $insertmbr->bindParam(':passw', $mdp, PDO::PARAM_STR);
            $insertmbr->bindParam(':date_naissance', $date, PDO::PARAM_STR);
            $insertmbr->bindParam(':genre', $genre, PDO::PARAM_STR);
            $insertmbr->bindParam(':tel', $phone, PDO::PARAM_STR);
            $insertmbr->execute();
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
    }
    public function name($username) {
        $reqUsername = $this->pdo->prepare("SELECT * FROM users WHERE username = :username;");
        $reqUsername->bindParam(':username', $username, PDO::PARAM_STR);
        $reqUsername->execute();
        if ($reqUsername->rowCount() == 0) {
            return true;
        }
        else {
            return false;
        }
    }
    public function phone($phone) {
        $reqPhone = $this->pdo->prepare("SELECT * FROM users WHERE telephone = :tel;");
        $reqPhone->bindParam(':tel', $phone, PDO::PARAM_STR);
        $reqPhone->execute();
        if ($reqPhone->rowCount() == 0) {
            return true;
        }
        else {
            return false;
        }
    }
    public function connectUser($connect, $mdpconnect) {
        $requser = $this->pdo->prepare("SELECT * FROM users WHERE (email = :mail OR username = :username OR telephone = :tel) AND password = :passw;");
        $requser->bindParam(':mail', $connect, PDO::PARAM_STR);
        $requser->bindParam(':username', $connect, PDO::PARAM_STR);
        $requser->bindParam(':tel', $connect, PDO::PARAM_STR);
        $requser->bindParam(':passw', $mdpconnect, PDO::PARAM_STR);
        $requser->execute();
        if ($requser->rowCount() == 1){
            return $requser->fetch();
        }
        else{
            return false;
        }
    }
    public function Gestion() {
            $getid = intval($_SESSION['id']);
            $requser = $this->pdo->prepare('SELECT * FROM users WHERE id = :id;');
            $requser->bindParam(':id', $getid, PDO::PARAM_INT);
            $requser->execute();
            return $requser->fetch();
    }
    public function getId($mail) {    
        $requser = $this->pdo->prepare('SELECT * FROM users WHERE email = :mail;');
        $requser->bindParam(':mail', $mail, PDO::PARAM_STR);
        $requser->execute();
        $varEmail = $requser->fetchAll();
        return $varEmail[0]["id"];
    }
    public function dataMembers() {
        $getid = intval($_SESSION['id']);
        $requser = $this->pdo->prepare('SELECT * FROM users WHERE id = :id;');
        $requser->bindParam(':id', $getid, PDO::PARAM_INT);
        $requser->execute();
        return $requser->fetch();
    }
    public function sessionId() {
        $requser = $this->pdo->prepare("SELECT * FROM users WHERE id = :id;");
        $requser->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $requser->execute();
        return $requser->fetch();
    }
    public function setFullname($newName) {
        $insertName = $this->pdo->prepare("UPDATE users SET name = :fullname WHERE id = :id;");
        $insertName->bindParam(':fullname', $newName, PDO::PARAM_STR);
        $insertName->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertName->execute();
    }
    public function setUsername($newUsername) {
        $insertUsername = $this->pdo->prepare("UPDATE users SET username = :username WHERE id = :id;");
        $insertUsername->bindParam(':username', $newUsername, PDO::PARAM_STR);
        $insertUsername->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertUsername->execute();
    }
    public function setBiography($newBio) {
        $insertBio = $this->pdo->prepare("UPDATE users SET biography = :biography WHERE id = :id;");
        $insertBio->bindParam(':biography', $newBio, PDO::PARAM_STR);
        $insertBio->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertBio->execute();
    }
    public function setVille($newVille) {
        $insertVille = $this->pdo->prepare("UPDATE users SET city = :ville WHERE id = :id;");
        $insertVille->bindParam(':ville', $newVille, PDO::PARAM_STR);
        $insertVille->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertVille->execute();
    }
    public function setPays($newPays) {
        $insertPays = $this->pdo->prepare("UPDATE users SET country = :pays WHERE id = :id;");
        $insertPays->bindParam(':pays', $newPays, PDO::PARAM_STR);
        $insertPays->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertPays->execute();
    }
    public function setEmail($newMail) {
        $insertMail = $this->pdo->prepare("UPDATE users SET email = :mail WHERE id = :id;");
        $insertMail->bindParam(':mail', $newMail, PDO::PARAM_STR);
        $insertMail->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertMail->execute();
    }
    public function setUrlWeb($newUrl) {
        $insertUrl = $this->pdo->prepare("UPDATE users SET website = :site_web WHERE id = :id;");
        $insertUrl->bindParam(':site_web', $newUrl, PDO::PARAM_STR);
        $insertUrl->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertUrl->execute();
    }
    public function setTel($newTel) {
        $insertUrl = $this->pdo->prepare("UPDATE users SET telephone = :tel WHERE id = :id;");
        $insertUrl->bindParam(':tel', $newTel, PDO::PARAM_STR);
        $insertUrl->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertUrl->execute();
    }
    public function setDate($newDate) {
        $insertDate = $this->pdo->prepare("UPDATE users SET dob = :date_naissance WHERE id = :id;");
        $insertDate->bindParam(':date_naissance', $newDate, PDO::PARAM_STR);
        $insertDate->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertDate->execute();
    }
    public function setMdp($getMdp) {
        $insertmdp = $this->pdo->prepare("UPDATE users SET password = :passw WHERE id = :id;");
        $insertmdp->bindParam(':passw', $getMdp, PDO::PARAM_STR);
        $insertmdp->bindParam(':id', $_SESSION['id'], PDO::PARAM_INT);
        $insertmdp->execute();
    }
}
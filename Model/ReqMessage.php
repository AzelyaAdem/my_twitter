<?php 
require_once "database.php";
class ReqMessage extends Database {
    private $userMessage;
    public function __construct() {
        $this->userMessage = new ReqMessage();
    }
    public function ViewMessage() {
        try {
            $mes = $this->pdo->prepare("SELECT content, created_at FROM messages WHERE content = ':message' ORDER BY created_at DESC LIMIT 20;");
            $mes -> bindParam(":message",$texte,PDO::PARAM_STR);
            $mes -> execute();
            $resultat = $mes -> fetchAll();
            echo json_encode($resultat);
        }
        catch(PDOException $e) {
            $e ->getMessage();
        }   
    }
    public function ReqMessage() {
        try {
            $reqM = $this->pdo->prepare("INSERT INTO messages(addressee, sender, content, created_at) VALUES(:id_user_to, :id_user_from, :message, NOW());");
            $reqM -> bindParam(":id_user_to" , $userSend,PDO::PARAM_INT);
            $reqM -> bindParam(":id_user_from",$userReceive,PDO::PARAM_INT);
            $reqM -> bindParam(":message",$texte,PDO::PARAM_STR);
            $reqM -> execute();
        }
        catch(PDOException $e) {
            $e->getMessage();
        }
    }
    /*
    public function ReqIdMessage() {
        try {
            $reqIdM = $this->pdo->prepare("SELECT id FROM members WHERE id = :id;");
            $reqIdM -> bindParam(":id",$_SESSION["id"],PDO::PARAM_INT);
            $reqIdM -> execute();
        }
        catch(PDOException $e) {
            $e -> getMessage();
        }
    }
    */
    public function SendMessage() {
        try {
            $reqSend = $this->pdo->prepare("SELECT id FROM users WHERE id = :username;");
            $reqSend -> bindParam(":username",$userId,PDO::PARAM_STR);
            $reqSend -> execute();
        }
        catch(PDOException $e) {
            $e -> getMessage();
        }
    }
    public function RecupId($User) {
        try {
            $User = $this->pdo->prepare("SELECT username FROM users WHERE id = username;");
            $User -> bindParam(":username",$username,PDO::PARAM_STR);
            $User -> execute();
        }
        catch(PDOException $e) {
            $e -> getMessage();
        }
    }
    public function AffichProfSend() {
        $req = $this->pdo->prepare("SELECT username FROM users;");
        $req -> execute();
    }
    public function rechercheNom() {
        $membre = $_POST['membre'];
        if(isset($membre)) {
            print "requeteUser dans la condition";?><br/><?php
            $requeNom = $this->pdo->prepare("SELECT * FROM users WHERE username LIKE ?;");
            $requeNom->execute(array($membre ."%"));
            while ($cherche = $requeNom->fetch()) {
                print $cherche["username"];?><br/><?php
            }
            $requeNom->closeCursor();
        }
        else {
            print "Je suis dans le else";
        }
    }
}
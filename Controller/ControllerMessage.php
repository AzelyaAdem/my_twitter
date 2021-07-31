<?php
require_once "../Model/ReqMessage.php";
require_once "../Model/database.php";
class ControllerMessage {
    private $userSend;
    public function __construct() {
        $this->userSend = new ReqMessage();
    }
    public function controlMessage() {}
    public function ReqContact() {
        if (isset($_SESSION["id"])) {
            return $this->userModel->rechercheNom();
        }
    }
    public function Member() {
        // print "controllerUser avant la condition";?><br/><?php
        if (isset($_POST['btnMembre'])) {
            print "controllerUser dans la condition";?><br/><?php
            return $this->userModel->rechercheNom();
        }
    }
}
?>
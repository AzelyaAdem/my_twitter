<?php
require_once "../Model/TweetsModel.php";
require_once "../Model/database.php";
class ControllerTweet {
    private $tweetModel;
    public function __construct() {
        $this->tweetModel = new requeteTweet();
    }
    public function submit() {
        if(isset($_SESSION['id'])) {
            if(isset($_POST['tSubmit'])) {
                if(isset($_POST['tContainer'])) {
                    $container = htmlspecialchars($_POST['tContainer']);
                    if(!empty($container)) {
                        $containerlenght = strlen($container);
                        if($containerlenght <= 140) {
                            if(isset($_POST['tNotif'])) {
                                $notif_tweet = 1;
                            }
                            else {
                                $notif_tweet = 0;
                            }
                            $this->tweetModel->tweet($container, $notif_tweet);
                        }
                        else {
                            return "Votre tweet ne dois pas dépasser 140 caractères";
                        }
                    }
                }
            }
        }
        else {
            return "Veuillez vous connecter pour poster un tweet !";
        }
    }
    public function displayTweet() {
        if(isset($_SESSION['id'])) {
            return $this->tweetModel->viewTweet();
        }
    }
    public function displayAllTweet(){
        if(isset($_SESSION['id'])){
            return $this->tweetModel->viewAllTweet();
        }
    }
}
/*
if(isset($_GET["tag"])) {
     $tag = preg_replace("%\#%", '', $_GET["tag"]);
     echo '<h1>' . $tag . '</h1>';
     $query = "SELECT * FROM tweets where body LIKE '%\#%'";
     $result = mysqli_query($connect, $query);
     if(mysqli_num_rows($result) > 0) {  
          while($row = mysqli_fetch_array($result)) {
               echo '<p>'.$row["body"].'</p>';  
          }  
     } else {  
          echo '<p>No Data Found</p>';
     }
}
function convertHashtoLink($container) {
     $expression = "%\#%";
     $container = preg_replace($expression, '<a href="hashtag/"'.$expression.'"?src=hashtag_click"</a>', $container);
     return $container;
}
$container = "#PHP means Hypertext Preprocessor<br />";
$container .= '#mysql is a nice database<br />';
$container .= "#Jquery is a Javascript Library<br />";
//<a href="">PHP</a>  
$container = convertHashtoLink($container);
echo $container;
*/
?>
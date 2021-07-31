<?php
require_once "database.php";
class requeteTweet extends Database {
    public function tweet($container, $notif_tweet) {
        $insertTweet = $this->pdo->prepare("INSERT INTO tweets(user_id, body, original_tweet_id, parent_id, created_at) VALUES(:id_user, :message, 1, :comm_counter, NOW());");
        $insertTweet->bindParam(':id_user',$_SESSION['id'],PDO::PARAM_INT);
        $insertTweet->bindParam(':message',$container, PDO::PARAM_STR);
        $insertTweet->bindParam(':comm_counter',$notif_tweet);
        $insertTweet->execute();
    }
    public function viewTweet() {
        $getid = intval($_SESSION['id']);
        $viewAllTweet = $this->pdo->prepare("SELECT * FROM tweets WHERE 'user_id' = :id_user ORDER BY id DESC;");
        $viewAllTweet->bindParam(':id_user',$getid,PDO::PARAM_INT);
        $viewAllTweet->execute();
        return $viewAllTweet->fetchAll();
    }
    /*
    public function viewTweet() {
        $getid = intval($_SESSION['id']);
        $viewTweet = $this->pdo->prepare("SELECT username FROM users INNER JOIN tweets ON users.id = tweets.user_id ORDER BY tweets.created_at DESC;");
        $viewTweet->bindParam(':id_user',$getid,PDO::PARAM_INT);
        $viewTweet->execute();
        return $viewTweet;
    }
    */
    public function viewAllTweet() {
        $viewAllTweet = $this->pdo->prepare("SELECT * FROM tweets ORDER BY id DESC");
        $viewAllTweet->execute();
        return $viewAllTweet->fetchAll();
    }
}
?>
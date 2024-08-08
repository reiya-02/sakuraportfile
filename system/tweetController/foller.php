<?php
    require_once('../../system/Controller/Connect.php');
    $dbConnect = new Connect;


    // いいね処理
    // if (isset($_POST['like_button'])) {
    if (isset($_POST['user_name']) && isset($_POST['por_id'])) {
        
    $por_id = (int)$_POST['por_id'];
    $user_name = $_POST['user_name'];
    
    // すでにいいねしているかどうかチェック
    $sql = "SELECT * FROM follows WHERE por_id = :por_id AND user_name = :user_name";
    $result = $dbConnect->pdo()->prepare($sql);

    $result->bindValue(':por_id',$por_id,PDO::PARAM_INT);
    $result->bindValue(':user_name',$user_name,PDO::PARAM_STR);
    $result->execute();
    $liked_user = $result->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($liked_user)) {
        // すでにいいねしているので、いいねを解除する
        $sql = "DELETE FROM follows WHERE por_id = :por_id AND user_name = :user_name";
        echo '';
    } else {
        // いいねしていないので、いいねを追加する
        $sql = "INSERT INTO follows (por_id, user_name, created_at) VALUES (:por_id, :user_name, NOW())";
        echo '';
    }
    $result = $dbConnect->pdo()->prepare($sql);

    $result->bindValue(':por_id',$por_id,PDO::PARAM_INT);
    $result->bindValue(':user_name',$user_name,PDO::PARAM_STR);
    $result->execute();



}

// 「いいね」の数を取得する
    if (isset($_POST['follower_id']) && !empty($_POST['follower_id'])) {
        $follower_id = (int)$_POST['follower_id'];
        
        $sql = 'SELECT COUNT(`follower_id`) FROM `follows` WHERE follower_id =' . $_POST['follower_id'];
        $stmt = $dbConnect->pdo()->prepare($sql);
        $stmt->execute();
        $likeCount = $stmt->fetchColumn();

        // 「いいね」の数を表示する
        echo $likeCount;

    }

    
?>
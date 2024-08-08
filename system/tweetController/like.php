<?php
    require_once('../../system/Controller/Connect.php');
    $dbConnect = new Connect;


    // いいね処理
    // if (isset($_POST['like_button'])) {
    if (isset($_POST['post_id']) && isset($_POST['por_id'])) {
        
    $por_id = (int)$_POST['por_id'];
    $post_id = (int)$_POST['post_id'];
    
    // すでにいいねしているかどうかチェック
    $sql = "SELECT * FROM likes WHERE por_id = :por_id AND post_id = :post_id";
    $result = $dbConnect->pdo()->prepare($sql);

    $result->bindValue(':por_id',$por_id,PDO::PARAM_INT);
    $result->bindValue(':post_id',$post_id,PDO::PARAM_INT);
    $result->execute();
    $liked_user = $result->fetchAll(PDO::FETCH_ASSOC);

    if (!empty($liked_user)) {
        // すでにいいねしているので、いいねを解除する
        $sql = "DELETE FROM likes WHERE por_id = :por_id AND post_id = :post_id";
        echo '';
    } else {
        // いいねしていないので、いいねを追加する
        $sql = "INSERT INTO likes (por_id, post_id, created_at) VALUES (:por_id, :post_id, NOW())";
        echo '';
    }
    $result = $dbConnect->pdo()->prepare($sql);

    $result->bindValue(':por_id',$por_id,PDO::PARAM_INT);
    $result->bindValue(':post_id',$post_id,PDO::PARAM_INT);
    $result->execute();



}

// 「いいね」の数を取得する
    if (isset($_POST['post_id']) && !empty($_POST['post_id'])) {
        $post_id = (int)$_POST['post_id'];
        
        $sql = 'SELECT COUNT(`post_id`) FROM `likes` WHERE post_id =' . $_POST['post_id'];
        $stmt = $dbConnect->pdo()->prepare($sql);
        $stmt->execute();
        $likeCount = $stmt->fetchColumn();

        // 「いいね」の数を表示する
        echo $likeCount;

    }

    
?>
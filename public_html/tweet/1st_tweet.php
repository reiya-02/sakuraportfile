<?php
    // セッションを開始する
    session_start();
    // Connect.phpでデータベースに接続している
    require_once('../../system/Controller/Connect.php');
    
    $dbConnect = new Connect;

    // ログイン状態をチェック
    if(empty($_SESSION["loggedin"])){
        // ログインしていない場合は、ログインページへリダイレクト
        header("location: ../login_html/login.php");
        exit;
    }

    $user_name = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>櫻坂ハウス</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../js/java.js"></script>
</head>
<body>

<a href="tweet_top.php"><input type="submit" value="投稿一覧に戻る" class="button"></a>

<form method="post" action="sakura_talk.php">
    <input type="hidden" name="user_name" value="<?= $user_name; ?>">
    <label class="selectbox-1">
        <select name="category_id">
            <option value="上村莉奈">上村 莉奈</option>
            <option value="小池美波">小池 美波</option>
            <option value="齋藤冬優花">齋藤 冬優花</option>
        </select>
    </label>
    <textarea name="tweet" class="tweet-text" cols="30" rows="5"></textarea>
    <input type="submit" value="投稿" class="button">
</form>
</body>
</html>
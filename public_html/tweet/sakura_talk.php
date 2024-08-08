<?php

session_start();
// セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
if(empty($_SESSION["loggedin"])){
    header("location: ../login_html/login.php");
    exit;
}

require_once('../../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */
require_once('../../system/tweetController/sakura_insert.php');  

$pdo = new sakuraController();

// フォームから送信されたデータを取得
$user_name = $_POST['user_name'];
$category_id = $_POST['category_id'];
$tweet = $_POST['tweet'];


?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>投稿完了</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h1>投稿しました</h1>
    <div>
        <a href="http://localhost:8888/sakura_dummy_public/public_html/login_done.php"><input type="submit" value="ホームへ戻る" class="button"></a><br>
        <a href="http://localhost:8888/sakura_dummy_public/public_html/tweet/tweet_top.php"><input type="submit" value="投稿一覧へ戻る" class="button"></a>
    </div>
</div>
</body>
</html>
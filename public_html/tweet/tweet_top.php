<?php
session_start();
// セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
if(empty($_SESSION["loggedin"])){
    header("location: ../login_html/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>櫻坂ハウス</title>
    <link rel="stylesheet" href="css/style.css">
    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script> -->
</head>     

<body>
    <a href="../login_done.php"><h1 class="text">櫻坂ハウス</h1></a>
    <h2 class="text2">Baddiesと楽しくお話ししよう!</h2>
    <div class="talk">
        <div class="talk1">
            <div class="sakuratalk">
                <a href="tweet.php">
                    <img src="img/sakura.jpg" class="sakura-item">
                </a>
                <h3>櫻坂46</h3>
                <p>櫻坂46全体に関連する投稿はこちら</p>
            </div>
            <div class="sakuratalk">
                <a href="1st_tweet.php">
                    <img src="img/sakura1stlogo.jpg" class="sakura-item">
                </a>
                <h3>1期生</h3>
                <p>1期生メンバーに関する投稿はこちら</p>
            </div>
        </div>
        <div class="talk2">
            <div class="sakuratalk">
                <a href="2nd_tweet.php">
                    <img src="img/sakura2ndlogo.jpg" class="sakura-item">
                </a>
                <h3>2期生</h3>
                <p>2期生メンバーに関連する投稿はこちら</p>
            </div>

            <div class="sakuratalk">
                <a href="3rd_tweet.php">
                    <img src="img/sakura3rdlogo.jpg" class="sakura-item">
                </a>
                <h3>3期生</h3>
                <p>3期生メンバーに関連する投稿はこちら</p>
            </div>
        </div>
    </div>
    <div class="talk">
        <div class="talkList1">
            <div class="sakuratalk">
                <a href="tweetList.php">
                    <img src="img/sakura.jpg" class="sakura-item">
                </a>
                <h3>櫻坂46</h3>
                <p>櫻坂46全体に関連する投稿一覧はこちら</p>
            </div>
            <div class="sakuratalk">
                <a href="1st_tweetList.php">
                    <img src="img/1stTOUR.jpg" class="sakura-item">
                </a>
                <h3>1期生</h3>
                <p>1期生メンバーに関連する投稿一覧はこちら</p>
            </div>
        </div>
        <div class="talkList2">
                <div class="sakuratalk">
                    <a href="2nd_tweetList.php">
                        <img src="img/2ndTOUR.jpg" class="sakura-item">
                    </a>
                    <h3>2期生</h3>
                    <p>2期生メンバーに関連する投稿一覧はこちら</p>
                </div>
                <div class="sakuratalk">
                    <a href="3rd_tweetList.php">
                        <img src="img/3rdTOUR.jpg" class="sakura-item">
                    </a>
                    <h3>3期生</h3>
                    <p>3期生メンバーに関連する投稿一覧はこちら</p>
                </div>
        </div>
    </div>
</body>
</html>
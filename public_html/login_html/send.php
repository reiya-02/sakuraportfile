<?php
// namespace sakura_dummy;

require_once('../../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */
require_once('../../system/Controller/insert.php');  /* DB接続用のファイルを読み込む */
    // $select = new SelectData();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>登録完了 </title>
<link rel="stylesheet" href="css2/style.css">
</head>
<body>
<div><h1>櫻坂ハウス</h1></div>
<div class="container">
        <h2 class="header">登録完了</h2>
        <form action="send.php" method="post">
        <div class="bel">
            <?php
            echo "<div class='ken'>".$_POST["familyname"]."</div>";
            echo "<div class='ken'>".$_POST["firstname"]."</div>";
            echo '<br>';
            echo "<div class='ken'>".$_POST["day"]."</div>";
            echo '<br>';
            echo "<div class='ken'>".$_POST["user_name"]."</div>";
            echo '<br>';
            echo "<div class='ken'>".$_POST["email"]."</div>";
            echo '<br>';
            // echo "<div class='ken'>".$hashed_password."</div>";
            // echo '<br>';       
            echo "<div class='ken'>".$_POST["tel"]."</div>";
            echo '<br>';       
            ?>
        </div> 
        <button><a href="http://localhost:8888/sakura_dummy_public/public_html/login_done.php">ホームへ戻る</a></button>
    </div>
</body>
</html>
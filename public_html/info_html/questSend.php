<?php
// namespace sakura_dummy;

    require_once('../../system/Controller/Connect.php');  
    require_once('../../system/questController/questInsert.php');  
    // $select = new SelectData();

?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>登録完了 </title>
<link rel="stylesheet" href="../login_html/css2/style.css">
</head>
<body>
<div><h1>櫻坂ハウス</h1></div>
<div class="container">
        <h2 class="header">送信完了</h2>
        <h3 class="">サイトに協力してくださりありがとうございます。</h3>
        <form action="questSend.php" method="post">
        <div class="bel">
            <?php
            echo "<div class='ken'>".$_POST["name"]."</div>";
            echo '<br>';
            echo "<div class='ken'>".$_POST["email"]."</div>";
            echo '<br>';
            echo "<div class='ken'>".$_POST["question"]."</div>";
            echo '<br>';       
            echo "<div class='ken'>".$_POST["content"]."</div>";
            echo '<br>';       
            ?>
        </div> 
        <button><a href="http://localhost:8888/sakura_dummy_public/public_html/index.html">ホームへ戻る</a></button>
    </div>
</body>
</html>
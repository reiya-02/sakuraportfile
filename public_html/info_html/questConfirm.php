<?php 
// namespace sakura_dummy;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから送信されたデータを各変数に格納
    $name = $_POST["name"];
    $email = $_POST["email"];
    $question = $_POST["question"];
    $content = $_POST["content"];
}


?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<title>お問い合わせ</title>
<link rel="stylesheet" href="../login_html/css2/style.css">
</head>
<body>
<div><h1>櫻坂ハウス</h1></div>
<div class="container">
        <h2 class="header">お問い合わせ内容確認</h2>
        <form action="questSend.php" method="post">
            <p>お問い合わせ内容はこちらでよろしいでしょうか？<br>よろしければ「送信する」ボタンを押して下さい。</p>
        <div class="bel">
            <?php
            echo "<div class='ken'>".$name."</div>";
            echo '<br>';
            echo "<div class='ken'>".$email."</div>";
            echo '<br>';
            echo "<div class='ken'>".$question."</div>";
            echo '<br>';
            echo "<div class='ken'>".$content."</div>";
            echo '<br>';
            ?>
        </div> 
            <input type="hidden" name="name" value="<?php echo isset($name) ? $name : ''; ?>"></input>
            <input type="hidden" name="email" value="<?php echo isset($email) ? $email : ''; ?>"></input>
            <input type="hidden" name="question" value="<?php echo isset($question) ? $question : ''; ?>"></input>
            <input type="hidden" name="content" value="<?php echo isset($content) ? $content : ''; ?>"></input>
            <input type="button" value="内容を修正する" onclick="history.back(-1)">
            <button type="submit">送信する</button>
        </form>
</div>
</body>
</html>


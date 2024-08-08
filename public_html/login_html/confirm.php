<?php 
// namespace sakura_dummy;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // フォームから送信されたデータを各変数に格納
    $familyname = $_POST["familyname"];
    $firstname = $_POST["firstname"];
    $day = $_POST["day"];
    $user_name = $_POST["user_name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $tel = $_POST["tel"];
}


// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';
// exit;
    // // パスワードをハッシュ化
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

?>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>新規会員登録</title>
<link rel="stylesheet" href="css2/style.css">
</head>
<body>
<div><h1>櫻坂ハウス</h1></div>
<div class="container">
        <h2 class="header">登録内容確認</h2>
        <form action="send.php" method="post">
            <p>登録内容はこちらでよろしいでしょうか？<br>よろしければ「登録する」ボタンを押して下さい。</p>
        <div class="bel">
            <?php
            echo "<div class='ken'>".$familyname."</div>";
            echo "<div class='ken'>".$firstname."</div>";
            echo '<br>';
            echo "<div class='ken'>".$day."</div>";
            echo '<br>';
            echo "<div class='ken'>".$user_name."</div>";
            echo '<br>';
            echo "<div class='ken'>".$email."</div>";
            echo '<br>';
            // echo "<div class='ken'>".$hashed_password."</div>";
            // echo '<br>';       
            echo "<div class='ken'>".$tel."</div>";
            echo '<br>';       
            ?>
        </div> 
            <input type="hidden" name="familyname" value="<?php echo isset($familyname) ? $familyname : ''; ?>"></input>
            <input type="hidden" name="firstname" value="<?php echo isset($firstname) ? $firstname : ''; ?>"></input>
            <input type="hidden" name="day" value="<?php echo isset($day) ? $day : ''; ?>"></input>
            <input type="hidden" name="user_name" value="<?php echo isset($user_name) ? $user_name : ''; ?>"></input>
            <input type="hidden" name="email" value="<?php echo isset($email) ? $email : ''; ?>"></input>
            <input type="hidden" name="password" value="<?php echo isset($hashed_password) ? $hashed_password : ''; ?>"></input>
            <input type="hidden" name="tel" value="<?php echo isset($tel) ? $tel : ''; ?>"></input>
            <input type="button" value="内容を修正する" onclick="history.back(-1)">
            <button type="submit">送信する</button>
        </form>
</div>
</body>
</html>


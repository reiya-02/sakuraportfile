<?php
session_start();

// セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ようこそ</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css2/welcome.css">
</head>
<body>
    <h1 class="my-5">こんにちは<b><?php echo htmlspecialchars($_SESSION["user_name"]); ?></b>櫻坂ハウスへ、ようこそ</h1>
    <p>
        <a href="../login_done.php" class="btn btn-danger ml-3">NEXT</a>
    </p>
</body>
</html>

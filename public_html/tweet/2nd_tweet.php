<?php
    session_start();
    require_once('../../system/Controller/Connect.php');
    $dbConnect = new Connect;

    // セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
    if(empty($_SESSION["loggedin"])){
        header("location: ../login_html/login.php");
        exit;
    }

    // if (isset($_POST['category_id'])) {

    //     $sql = "SELECT * FROM tweets WHERE category_id = :category_id";
    //     $stmt = $dbConnect->pdo()->prepare($sql);

    //     $stmt->bindValue('category_id',$_POST['category_id'],PDO::PARAM_STR);
    //     $stmt->execute();
    //     $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // }
    $user_name = $_SESSION['user_name'];

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>櫻坂ハウス</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="../js/java.js"></script>
</head>
<body>
    
<a href="tweet_top.php"><input type="submit" value="投稿一覧に戻る" class="button"></a>

<form method="post" action="sakura_talk.php">
<input type="hidden" name="user_name" value="<?= $user_name; ?>">
    <label class="selectbox-1">
        <select name="category_id">
            <option value="井上 梨名">井上 梨名</option>
            <option value="遠藤 光莉">遠藤 光莉</option>
            <option value="大園 玲">大園 玲</option>
            <option value="大沼 晶保">大沼 晶保</option>
            <option value="幸坂 茉里乃">幸坂 茉里乃</option>
            <option value="武元 唯衣">武元 唯衣</option>
            <option value="田村 保乃">田村 保乃</option>
            <option value="藤吉 夏鈴">藤吉 夏鈴</option>
            <option value="増本 綺良">増本 綺良</option>
            <option value="松田 里奈">松田 里奈</option>
            <option value="森田 ひかる">森田 ひかる</option>
            <option value="守屋 麗奈">守屋 麗奈</option>
            <option value="山﨑 天">山﨑 天</option>
        </select>
    </label>
    <textarea name="tweet" class="tweet-text" cols="30" rows="5"></textarea>
    <input type="submit" value="投稿" class="button">
</form>

</body>
</html>
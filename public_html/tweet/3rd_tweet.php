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
</head>
<body>

<a href="tweet_top.php"><input type="submit" value="投稿一覧に戻る" class="button"></a>

<form method="post" action="sakura_talk.php">
<input type="hidden" name="user_name" value="<?= $user_name; ?>">
    <label class="selectbox-1">
        <select name="category_id">
            <option value="石森 璃花">石森 璃花</option>
            <option value="遠藤 理子">遠藤 理子</option>
            <option value="小田倉 麗奈">小田倉 麗奈</option>
            <option value="小島 凪紗">小島 凪紗</option>
            <option value="谷口 愛季">谷口 愛季</option>
            <option value="中嶋 優月">中嶋 優月</option>
            <option value="的野 美青">的野 美青</option>
            <option value="向井 鈍葉">向井 鈍葉</option>
            <option value="村井 優">村井 優</option>
            <option value="村山 美羽">村山 美羽</option>
            <option value="山下 瞳月">山下 瞳月</option>
        </select>
    </label>
    <textarea name="tweet" class="tweet-text" cols="30" rows="5"></textarea>
    <input type="submit" value="投稿" class="button">
</form>

</body>
</html>
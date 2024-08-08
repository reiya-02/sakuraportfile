<?php
    session_start();
    require_once('../../system/Controller/functions.php');
    require_once('../../system/Controller/Connect.php');
    require_once('../../system/tweetController/like.php');
    require_once('../../system/tweetController/foller.php');

    $dbConnect = new Connect;

    // セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
    if(empty($_SESSION["loggedin"])){
        header("location: ../login_html/login.php");
        exit;
    }

    if (isset($_POST['category_id'])) {
        // $sql = "SELECT * FROM tweets WHERE category_id = :category_id";
        $sql = "SELECT * FROM tweets WHERE category_id = :category_id ORDER BY created_at DESC";
        $stmt = $dbConnect->pdo()->prepare($sql);

        $stmt->bindValue('category_id',$_POST['category_id'],PDO::PARAM_STR);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);


    }
    $user_name = $_SESSION['user_name'];

    if (isset($_SESSION['por_id'])) {
        $por_id = $_SESSION['por_id'];
    } else {
        $por_id = "default_value"; // ここには、por_idが未定義の場合に使用するデフォルト値を設定します
    }

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

<form method="post" action="">
    <label class="selectbox">
        <select name="category_id" id="category">
            <?php
            $options = array("上村莉奈", "小池美波", "齋藤冬優花");
            foreach ($options as $option) {
                $selected = ($_POST['category_id'] == $option) ? 'selected' : '';
                echo "<option value=\"$option\" $selected>$option</option>";
            }
            ?>
        </select>
        <input type="submit" value="投稿を見る"  class="buttonList">
    </label>
</form>
    <table>
            <?php
                if (isset($users)) {
                    foreach($users as $user) {
                        echo "<th>" . 
                        $user['user_name'] . 
                        // "<button type='button' class='foller_button' data-user_name='".$user['user_name']."' data-por_id='".$por_id."'>" . 
                        // "フォロー" . 
                        // "</button>" .
                        "</th>";
                        echo "<td>" . htmlspecialchars($user['tweet'], ENT_QUOTES, 'UTF-8') . "</td>";
                        echo "<td>" . 
                        $user['created_at'] .
                        "<button type='button' class='like_button' data-post_id='".$user['id']."' data-por_id='".$por_id."'>" . 
                        '<svg class="like_button__icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><path d="M91.6 13A28.7 28.7 0 0 0 51 13l-1 1-1-1A28.7 28.7 0 0 0 8.4 53.8l1 1L50 95.3l40.5-40.6 1-1a28.6 28.6 0 0 0 0-40.6z"/></svg>' . 
                        "いいね" . 
                        "</button>" .
                        "<span id='like_count_".$user['id']."'>0</span>" .
                        "</td>";
                    }
                }  
            ?>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/java.js"></script>

</body>
</html>
<?php
session_start();
require_once('../../system/Controller/Connect.php');
// require_once('fountDB.php');

$dbConnect = new Connect;

    // セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
    if(empty($_SESSION["loggedin"])){
        header("location: ../login_html/login.php");
        exit;
    }

    // if (isset($_POST['category_id'])) {
        $sql = "SELECT * FROM `tweets` WHERE`user_name` = :user_name ORDER BY `created_at` DESC";
        $stmt = $dbConnect->pdo()->prepare($sql);

        $stmt->bindValue(":user_name",$_SESSION['user_name'],PDO::PARAM_STR);
        $stmt->execute();
        $tweets = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // }    
      
        
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
    <!-- アップロードした画像を表示するための要素 -->
    <img id="uploadedImage" src="" alt="アップロードした画像"/>

    <form id="uploadForm" action="../../system/accountController/fountDB.php" method="post" enctype="multipart/form-data">
    画像を選択:
        <input type="file" name="fileToUpload" id="fileToUpload">
        <input type="submit" value="画像を選択" name="submit">
    </form>


</form>
<table>
<?php
    if (isset($tweets)) {
        foreach($tweets as $tweet) {
            echo "<th>" . $tweet['user_name'];
            echo "<button type='button' class='btn btn-red delete' data-id=" . $tweet['id'] . ">削除</button>";
            echo "<form method='POST' action='../../system/accountController/tweetDelete.php' id='delete_form_" . $tweet['id'] . "'>";
            echo "<input type='hidden' value='" . $tweet['id'] . "' name='id'>";
            echo "</form>";
            "</th>";
            echo "<td>" . htmlspecialchars($tweet['tweet'], ENT_QUOTES, 'UTF-8') . "</td>";
            echo "<td>" . $tweet['created_at'] . "</td>";
        }
    }
?>

</table>
<footer>
    <a href="information.php">
        <input type="submit" value="アカウント情報変更" />
    </a>
    <a href="reset_pass.php">
    <input type="submit" value="パスワード再設定" />
    </a>
    <a href="delete.php">
    <input type="submit" value="退会" />
    </a>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/mypage.js"></script>

</body>
</html>
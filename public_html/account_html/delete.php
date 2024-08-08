<?php
 
/* セッション開始 */
session_start();

/* データベース接続 */
require_once('../../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */
$pdo = new Connect();

// セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
if(empty($_SESSION["loggedin"])){
    header("location: ../login_html/login.php");
    exit;
}

 
/* 退会処理 */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  /* ログイン状態で、かつ退会ボタンを押した */
  if (isset($_SESSION['loggedin']) && isset($_POST['is_delete'])) {
      $reason = $_POST['reason'];
      $user_name = $_SESSION['user_name'];

      $sql = "INSERT INTO deletion (reason, user_name) VALUES (:reason, :user_name)";
      $stmt = $pdo->pdo()->prepare($sql);
      $stmt->bindValue(':reason', $reason);
      $stmt->bindValue(':user_name', $user_name);
      $stmt->execute();

      $sql = "DELETE FROM port WHERE por_id = :por_id";
      $stmt = $pdo->pdo()->prepare($sql);
      $stmt->bindValue(':por_id', $_SESSION['por_id']);
      $stmt->execute();

      session_destroy(); // セッションを破壊
      header('Location: ../index.html');
      exit;

  }
}
 
?>
 
<!DOCTYPE html>
 
<html>
  <head>
    <title>退会画面</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <h1>退会画面</h1>
    <p>退会しますか？</p>

    <form action="./delete.php" method="POST">
        <label class="quest">
            <select name="reason">
                <option value="サイトを使わなくなった">サイトを使わなくなった</option>
                <option value="他のアカウントのコメントが気に入らなかった">他のアカウントのコメントが気に入らなかった</option>
                <option value="その他">その他<option>
            </select>
        </label><br>

      <input type="hidden" name="is_delete">
      <input type="submit" value="退会する">
    </form>
    <a href="mypage.php">
    <input type="submit" value="マイページに戻る">
    </a>
  </body>
</html>
 
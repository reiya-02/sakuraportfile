<?php
// namespace login;

//ファイルの読み込み
require_once('../../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */
require_once('../../system/Controller/functions.php');  /* DB接続用のファイルを読み込む */

$pdo = new Connect();
//セッション開始
session_start();

// セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../login_done.php");
    exit;
}

//POSTされてきたデータを格納する変数の定義と初期化
$datas = [
    'user_name' => '',
    'email'  => '',
    'password'  => '',
];
$login_err = "";

//GET通信だった場合はセッション変数にトークンを追加
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    setToken();
}

//POST通信だった場合はログイン処理を開始
if($_SERVER["REQUEST_METHOD"] == "POST"){
    ////CSRF対策
    checkToken();

    // POSTされてきたデータを変数に格納
    foreach($datas as $key => $value) {
        if($value = filter_input(INPUT_POST, $key, FILTER_DEFAULT)) {
            $datas[$key] = $value;
        }
    }

    // バリデーション
    $errors = validation($datas,false);    
    if(empty($errors)){
        //ユーザーネームから該当するユーザー情報を取得
        $sql = "SELECT * FROM port WHERE user_name = :user_name AND email = :email";
        $stmt = $pdo->pdo()->prepare($sql);

        $stmt->bindValue('user_name',$datas['user_name'],PDO::PARAM_STR);
        $stmt->bindValue('email',$datas['email'],PDO::PARAM_STR);
        $stmt->execute();
        //ユーザー情報があれば変数に格納
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            //パスワードがあっているか確認
            if (password_verify($datas['password'],$row['password'])) {
                //セッションIDをふりなおす
                session_regenerate_id(true);
                //セッション変数にログイン情報を格納
                $_SESSION["loggedin"] = true;
                $_SESSION["por_id"] = $row['por_id'];
                $_SESSION["user_name"] = $row['user_name'];
                $_SESSION["email"] =  $row['email'];
                //ウェルカムページへリダイレクト
                header("location:../login_done.php");
                exit();
            } else {
                $login_err = 'パスワードが正しくありません';
            }
        }else {
            $login_err = 'メールアドレス、もしくはパスワードが正しくありません';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css2/style.css">
</head>
<body>
    <div class="container">
        <h2>ログイン</h2>
        <p>ログイン情報を入力してください</p>

        <?php 
        if(isset($login_err) && !empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo $_SERVER ['SCRIPT_NAME']; ?>" method="post">
            <div class="form-group">
                <label>ユーザーネーム</label>
                <input type="text" name="user_name" class="form-control <?php echo (isset($errors['user_name']) && !empty(h($errors['user_name']))) ? 'is-invalid' : ''; ?>" value="<?php echo h($datas['user_name']); ?>">
                <span class="invalid-feedback"><?php echo isset($errors['user_name']) ? h($errors['user_name']) : ''; ?></span>
            </div>    
            <div class="form-group">
                <label>メールアドレス</label>
                <input type="text" name="email" class="form-control <?php echo (isset($errors['email']) && !empty(h($errors['email']))) ? 'is-invalid' : ''; ?>" value="<?php echo h($datas['email']); ?>">
                <span class="invalid-feedback"><?php echo isset($errors['email']) ? h($errors['email']) : ''; ?></span>
            </div>    
            <div class="form-group">
                <label>パスワード</label>
                <input type="password" name="password" class="form-control <?php echo (isset($errors['password']) && !empty(h($errors['password']))) ? 'is-invalid' : ''; ?>" value="<?php echo h($datas['password']); ?>">
                <span class="invalid-feedback"><?php echo isset($errors['password']) ? h($errors['password']) : ''; ?></span>
            </div>
            <div class="form-group">
                <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
                <input type="submit" class="btn btn-primary" value="ログイン">
            </div>
            <p>アカウントをお持ちでない方は <a href="index.php">新規登録</a></p>
            <p>パスワードをお忘れの方はこちら <a href="../account_html/reset_pass.php">パスワード再設定</a></p>
        </form>
    </div>
</body>
</html>

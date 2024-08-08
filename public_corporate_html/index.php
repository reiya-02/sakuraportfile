<?php
//ファイルの読み込み
require_once('../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */
require_once('../system/Controller/function_cor.php');  /* DB接続用のファイルを読み込む */

$pdo = new Connect();
//セッション開始
session_start();

// セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
if(isset($_SESSION["login"]) && $_SESSION["login"] === true){
    header("location: dashboard.php");
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
        $sql = "SELECT * FROM management WHERE user_name = :user_name";
        $stmt = $pdo->pdo()->prepare($sql);

        $stmt->bindValue('user_name',$datas['user_name'],PDO::PARAM_STR);
        $stmt->execute();

        //ユーザー情報があれば変数に格納
        if($row = $stmt->fetch(PDO::FETCH_ASSOC)){

            //パスワードがあっているか確認
            if ($datas['user_name'] === $row['user_name'] && $datas['email'] === $row['email'] && $datas['password'] === $row['password']) {
                //セッションIDをふりなおす
                session_regenerate_id(true);
                //セッション変数にログイン情報を格納
                $_SESSION["login"] = true;
                $_SESSION["id"] = $row['id'];
                $_SESSION["user_name"] = $row['user_name'];
                $_SESSION["email"] =  $row['email'];
                //ダッシュボードへリダイレクト
                header("location:dashboard.php");
                exit();
            } else {
                $login_err = 'メールアドレス、もしくはパスワードが正しくありません';
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
    <title>ログイン</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css2/style.css">
</head>
<body>
    <div class="container">
        <h2>ログイン</h2>
        <p>ログイン情報を入力してください</p>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <form action="<?php echo $_SERVER ['SCRIPT_NAME']; ?>" method="post">
            <div class="form-group">
                <label>ユーザーネーム</label>
                <input type="text" name="user_name" class="form-control <?php echo (!empty(h($errors['user_name']))) ? 'is-invalid' : ''; ?>" value="<?php echo h($datas['user_name']); ?>">
                <span class="invalid-feedback"><?php echo h($errors['user_name']); ?></span>
            </div>
            <div class="form-group">
                <label>メールアドレス</label>
                <input type="text" name="email" class="form-control <?php echo (!empty(h($errors['email']))) ? 'is-invalid' : ''; ?>" value="<?php echo h($datas['email']); ?>">
                <span class="invalid-feedback"><?php echo h($errors['email']); ?></span>
            </div>    
            <div class="form-group">
                <label>パスワード</label>
                <input type="password" name="password" class="form-control <?php echo (!empty(h($errors['password']))) ? 'is-invalid' : ''; ?>" value="<?php echo h($datas['password']); ?>">
                <span class="invalid-feedback"><?php echo h($errors['password']); ?></span>
            </div>
            <div class="form-group">
                <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
                <input type="submit" class="btn btn-primary" value="ログイン">
                <p>パスワードをお忘れの方はこちら <a href="reset_pass.php">パスワード再設定</a></p>
            </div>
        </form>
    </div>
</body>
</html>

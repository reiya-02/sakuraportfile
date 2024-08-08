<?php
// namespace register;

//ファイルの読み込み
require_once('../../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */
require_once('../../system/Controller/functionHtml.php');  /* DB接続用のファイルを読み込む */
require_once('../../system/Controller/insert.php');  /* INSERTクエリ用のファイルを読み込む */

$pdo = new Connect();
//セッション開始
session_start();

//POSTされてきたデータを格納する変数の定義と初期化
$datas = [
    'familyname' => '',
    'firstname' => '',
    'day' => '',
    'user_name' => '',
    'email'  => '',
    'password'  => '',
    'tel'  => '',
];
$register_err = "";

//GET通信だった場合はセッション変数にトークンを追加
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    setToken();
}

//POST通信だった場合は新規登録処理を開始
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
    $errors = validation($datas,true);    
    if(empty($errors)){
        //ユーザーネームから該当するユーザー情報を取得
        $row = selectUser($pdo, $datas['user_name'], $datas['email']);
        //ユーザー情報があればエラー
        if($row){
            $register_err = 'ユーザーネームまたはメールアドレスが既に存在します';
        }else {
            //ユーザー情報がなければ新規登録
            insert_sortable($pdo, $datas['user_name'], $datas['email'], $datas['password']);
            //ウェルカムページへリダイレクト
            header("location:../login_done.php");
            exit();
        }
    }
}
?>



<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="UTF-8">
<title>新規登録登録</title>
<link rel="stylesheet" href="css2/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>            
    <form action="confirm.php" method="post" name="form">
        <div class="container">
            <h1>櫻坂ハウス</h1>
            <h2 class="header">新規会員登録</h2>
            <p>登録内容をご確認の上、</p>
            <p>「確認画面へ」ボタンをクリックしてください。</p>
            
            <?php 
            if(isset($register_err) && !empty($register_err)){
                echo '<div class="alert alert-danger">' . $register_err . '</div>';
            }        
            ?>

            <div class="bel">
                <label>お名前<span>＊必須</span></label>
                <input type="text" name="familyname"  class="familyname <?php echo (isset($errors['familyname']) && !empty(h($errors['familyname']))) ? 'is-invalid' : ''; ?>" placeholder="例）山田" value="<?php echo h($datas['familyname']); ?>">
                <span class="invalid-feedback"><?php echo isset($errors['familyname']) ? h($errors['familyname']) : ''; ?></span>
                <input type="text" name="firstname"  class="firstname <?php echo (isset($errors['firstname']) && !empty(h($errors['firstname']))) ? 'is-invalid' : ''; ?>" placeholder="太郎" value="<?php echo h($datas['firstname']); ?>">
                <span class="invalid-feedback"><?php echo isset($errors['firstname']) ? h($errors['firstname']) : ''; ?></span>
            </div>
            <div class="bel">
                <label>生年月日<span>＊必須</span></label>
                <input type="date" name="day">
            </div>
            <div class="bel">
                <label>ユーザー名<span>＊必須</span></label>
                <input type="text" name="user_name"  class="user_name <?php echo (isset($errors['user_name']) && !empty(h($errors['user_name']))) ? 'is-invalid' : ''; ?>" placeholder="例）タロウ" value="<?php echo h($datas['user_name']); ?>">
                <span class="invalid-feedback"><?php echo isset($errors['user_name']) ? h($errors['user_name']) : ''; ?></span>
            </div>
            <div class="bel">
                <label>メールアドレス<span>＊必須</span></label>
                <input type="text" name="email"  class="email <?php echo (isset($errors['email']) && !empty(h($errors['email']))) ? 'is-invalid' : ''; ?>" placeholder="例）guest@example.com" value="<?php echo h($datas['email']); ?>">
                <span class="invalid-feedback"><?php echo isset($errors['email']) ? h($errors['email']) : ''; ?></span>
            </div>
            <div class="bel">
                <label>パスワード<span>＊必須</span></label>
                <input type="text" name="password"  class="password <?php echo (isset($errors['password']) && !empty(h($errors['password']))) ? 'is-invalid' : ''; ?>" value="<?php echo h($datas['password']); ?>">
                <span class="invalid-feedback"><?php echo isset($errors['password']) ? h($errors['password']) : ''; ?></span>
            </div>
            <div class="bel">
                <label>電話番号<span>＊必須</span></label>
                <input type="text" name="tel"  class="tel <?php echo (isset($errors['tel']) && !empty(h($errors['tel']))) ? 'is-invalid' : ''; ?>" placeholder="例）0000000000" value="<?php echo h($datas['tel']); ?>">
                <span class="invalid-feedback"><?php echo isset($errors['tel']) ? h($errors['tel']) : ''; ?></span>
            </div>
            <div class="form-group">
                <input type="hidden" name="token" value="<?php echo h($_SESSION['token']); ?>">
                <button type="submit"><a>確認画面へ</a></button><br>
                <button><a href="../index.html">ホームへ戻る</a></button>
            </div>
            <!-- <button type="submit"><a>確認画面へ</a></button><br> -->
            <!-- <button><a href="../index.html">ホームへ戻る</a></button> -->
        </div>
    </form>

</body>
</html>

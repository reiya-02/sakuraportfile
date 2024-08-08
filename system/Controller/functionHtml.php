<?php
// namespace login;

require_once('Connect.php');  /* DB接続用のファイルを読み込む */


//XSS対策
function h($s){
    return htmlspecialchars($s ?? '',  ENT_QUOTES, "UTF-8");
}

//セッションにトークンセット
function setToken(){
    $token = sha1(uniqid(mt_rand(), true));
    $_SESSION['token'] = $token;
}

//セッション変数のトークンとPOSTされたトークンをチェック
function checkToken(){
    if(empty($_SESSION['token']) || ($_SESSION['token'] != $_POST['token'])){
        echo 'Invalid POST', PHP_EOL;
        exit;
    }
}

// selectUser.php
function selectUser($pdo, $user_name, $email) {
    $sql = "SELECT * FROM port WHERE user_name = :user_name AND email = :email";
    $stmt = $pdo->pdo()->prepare($sql);
    $stmt->bindValue('user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue('email', $email, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
  

//POSTされた値のバリデーション
function validation($datas,$confirm = true)
{
    $errors = [];

    $pdo = new Connect();

    if(empty($datas['familyname'])) {
        $errors['familyname'] = 'ユーザー名を入力してください.';
    } 

    if(empty($datas['firstname'])) {
        $errors['firstname'] = 'ユーザー名を入力してください.';
    } 

    if(empty($datas['day'])) {
        $errors['day'] = 'ユーザー名を入力してください.';
    } 

    if(empty($datas['user_name'])) {
        $errors['user_name'] = 'ユーザー名を入力してください.';
    } 

        //ユーザー名のチェック
    if(empty($datas['email'])) {
        $errors['email'] = 'メールアドレスを入力してください.';
    } else if(!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = '有効なメールアドレスを入力してください.';
    } else if(mb_strlen($datas['email'], "UTF-8") > 30) {
        $errors['email'] = 'メールアドレスは30文字以内です.';
    } 

    //パスワードのチェック（正規表現）
    if(empty($datas["password"])){
        $errors['password']  = " パスワードを入力してください.";
    }else if(!preg_match('/\A[a-z\d]{8,100}+\z/i',$datas["password"])){
        $errors['password'] = "正しい入力をしてください.";
    } 

    if(empty($datas['tel'])) {
        $errors['tel'] = 'ユーザー名を入力してください.';
    } 

    return $errors;
    
}

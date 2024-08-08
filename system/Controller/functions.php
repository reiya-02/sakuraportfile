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

  

//POSTされた値のバリデーション
function validation($datas,$confirm = true)
{
    $errors = [];

    $pdo = new Connect();

    $sql = "SELECT * FROM port WHERE user_name = :user_name";
    $stmt = $pdo->pdo()->prepare($sql);

    $stmt->bindValue('user_name',$datas['user_name'],PDO::PARAM_STR);
    $stmt->execute();
    $user = $stmt->fetch();

    if(empty($datas['user_name'])) {
        $errors['user_name'] = 'ユーザー名を入力してください.';
    }else if (!$user) {
        $errors['user_name'] = 'ユーザー名が登録されていません.';
    } 

        //ユーザー名のチェック
    if(empty($datas['email'])) {
        $errors['email'] = 'メールアドレスを入力してください.';
    } else if(!filter_var($datas['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = '有効なメールアドレスを入力してください.';
    } else if(mb_strlen($datas['email'], "UTF-8") > 30) {
        $errors['email'] = 'メールアドレスは30文字以内です.';
    } else if (!$user) {
        $errors['email'] = 'このユーザーでメールアドレスが登録されていません.';
    }

    //パスワードのチェック（正規表現）
    if(empty($datas["password"])){
        $errors['password']  = " パスワードを入力してください.";
    }else if(!preg_match('/\A[a-z\d]{8,100}+\z/i',$datas["password"])){
        $errors['password'] = "正しい入力をしてください.";
    } else if (!$user) {
        $errors['password'] = 'このユーザーでパスワードが登録されていません.';
    }

    return $errors;
    
}

function check_favolite_duplicate($port_id,$tweets_id){
    $dbConnect = new Connect;
    $sql = "SELECT *
            FROM likes
            WHERE port_id = :port_id AND tweets_id = :tweets_id";
    $stmt = $dbConnect->pdo()->prepare($sql);
    $stmt->execute(array(':port_id' => $port_id ,
                         ':tweets_id' => $tweets_id));
    $likes = $stmt->fetch();
    return $likes;
}


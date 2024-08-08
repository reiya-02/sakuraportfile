<?php
session_start();

if($_SESSION['login'] == false){
    header("location:../../../public_corporate_html/index.php");
    exit;
}

try{
    $dbh = new PDO("mysql:host=localhost;dbname=port_db","port_user","port_pass");
}catch(PDOException $e){
    var_dump($e->getMessage());
    exit;
}

$stmt = $dbh->prepare("SELECT * FROM port");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

$fp = fopen('./users.csv','w');

//BOMあり
fwrite($fp, "\xEF\xBB\xBF");

$header = ['por_id','名前','生年月日','ユーザーネーム','メールアドレス','パスワード','電話番号','登録日時'];
fputcsv($fp,$header);


foreach($users as $user){
    fputcsv($fp,$user);
}

fclose($fp);

header('Location:./users.csv');
?>
<?php
session_start();

require_once('../Controller/Connect.php');  /* DB接続用のファイルを読み込む */

$pdo = new Connect();

    if($_SESSION['loggedin'] == false){
        header("Location:./index.php");
        exit;
    }

    $id = isset($_POST['id'])? htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8'):'';
    $sql = "DELETE FROM tweets WHERE id = :id";

    $stmt = $pdo->pdo()->prepare($sql);

    $stmt->bindValue(':id', $id);
    $stmt->execute();

    header('Location: ../../public_html/account_html/mypage.php');
?>
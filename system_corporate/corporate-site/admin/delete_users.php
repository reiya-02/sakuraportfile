<?php
session_start();

require_once('../../../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */

$pdo = new Connect();

    if($_SESSION['login'] == false){
        header("location:../../../public_corporate_html/index.php");
        exit;
    }

    $por_id = isset($_POST['por_id'])? htmlspecialchars($_POST['por_id'], ENT_QUOTES, 'utf-8'):'';
    
    $sql = "DELETE FROM port WHERE por_id = :por_id";

    $stmt = $pdo->pdo()->prepare($sql);

    $stmt->bindValue(':por_id', $por_id);
    $stmt->execute();

    header('Location: ../../../public_corporate_html/users.php');

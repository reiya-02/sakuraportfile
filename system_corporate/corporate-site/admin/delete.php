<?php
session_start();

    if($_SESSION['loggedin'] == false){
        header("Location:./index.php");
        exit;
    }

    $name = isset($_POST['id'])? htmlspecialchars($_POST['id'], ENT_QUOTES, 'utf-8'):'';

    try{
        $dbh = new PDO("mysql:host=localhost;dbname=port_db","port_user","port_pass");
    }catch(PDOException $e){
        var_dump($e->getMessage());
        exit;
    }

    $stmt = $dbh->prepare("DELETE FROM tweets WHERE id=:id");
    $stmt->bindParam(":id",$id);
    $stmt->execute();

    header('location:/tweet.php');
?>

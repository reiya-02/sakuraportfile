<?php
    session_start();
    $_SESSION['login'] = false;

    header('location:../../../public_corporate_html/index.php');
?>
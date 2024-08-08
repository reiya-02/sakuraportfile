<?php
session_start();
    if($_SESSION['login'] == false){
        header("Location:./index.php");
        exit;
    }
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-13xxxxxxxxx"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag() { dataLayer.push(arguments); }
        gtag('js', new Date());

        gtag('config', 'UA-13xxxxxxxxx');
    </script>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>ダッシュボード</title>

    <link rel="icon" href="favicon.ico">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-logo">
                <h1><a href="dashboard.html">管理画面</a></h1>
            </div>

            <nav class="menu-right menu">
                <a href="../system_corporate/corporate-site/admin/logout.php">ログアウト</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>ダッシュボード</h3>
                </div>
                <div class="boxs">
                    <a href="tweet.php" class="box">
                        <i class="far fa-newspaper icon"></i><!-- fontawesome利用部分 -->
                        <p>投稿管理</p>
                    </a>
                    <a href="users.php" class="box">
                        <i class="fas fa-users icon"></i>
                        <p>会員管理</p>
                    </a>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>Copyright @ 2018 SQUARE, inc</p>
        </div>
    </footer>
</body>

</html>
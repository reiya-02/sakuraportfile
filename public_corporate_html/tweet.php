<?php
session_start();

require_once('../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */

$pdo = new Connect();

    if($_SESSION['login'] == false){
        header("Location:./index.php");
        exit;
    }

    $user_name = isset($_POST['user_name'])? htmlspecialchars($_POST['user_name'], ENT_QUOTES, 'utf-8'):'';

    if($user_name == '')
        {
            $sql = "SELECT * FROM tweets";
            $stmt = $pdo->pdo()->prepare($sql);

        }else{
            $sql = "SELECT * FROM tweets WHERE user_name like :user_name";
            $stmt = $pdo->pdo()->prepare($sql);
            $stmt->bindValue(":user_name",'%'.$user_name.'%');    
        }

    $stmt->execute();
    $tweets = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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

    <title>会員管理</title>

    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

    <!-- css -->
    <link rel="stylesheet" href="styles.css">
</head>

<body>
    <header>
        <div class="container">
            <div class="header-logo">
                <h1><a href="dashboard.php">管理画面</a></h1>
            </div>

            <nav class="menu-right menu">
                <a href="index.php">ログアウト</a>
            </nav>
        </div>
    </header>
    <main>
        <div class="wrapper">
            <div class="container">
                <div class="wrapper-title">
                    <h3>投稿管理</h3>
                </div>
            <form class="serch" action="tweet.php" method="POST">
                <input type="text" name="user_name" placeholder="名前検索">
                <button type="submit" class="btn btn-blue">検索</button>
            </form>

            <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>id</th>
                                <th>ユーザーネーム</th>
                                <th>メンバー</th>
                                <th>投稿内容</th>
                                <th>投稿時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tweets as $tweet): ?>
                            <tr>
                                <td><?php echo $tweet['id']; ?></td>
                                <td><?php echo $tweet['user_name']; ?></td>
                                <td><?php echo $tweet['category_id']?></td>
                                <td><?php echo $tweet['tweet']; ?></td>
                                <td><?php echo $tweet['created_at']; ?></td>
                            <td>
                                <button type="button" class="btn btn-red delete" data-id=<?php echo $tweet['id']; ?>>削除</button>                            </tr>
                                <form method="POST" action="../system_corporate/corporate-site/admin/delete_tweet.php" id="delete_form_<?php echo $tweet['id']; ?>">
                                    <input type="hidden" value="<?php echo $tweet['id']; ?>" name="id">
                                </form>
                            </td>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <p>Copyright @ 2018 SQUARE, inc</p>
        </div>
    </footer>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="../public_html/js/java.js"></script>
</body>
</html>
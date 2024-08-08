<?php
session_start();

require_once('../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */

$pdo = new Connect();

    if($_SESSION['login'] == false){
        header("Location:./index.php");
        exit;
    }

    $familyname = isset($_POST['familyname'])? htmlspecialchars($_POST['familyname'], ENT_QUOTES, 'utf-8'):'';

    if($familyname == '')
        {
            $sql = "SELECT * FROM port";
            $stmt = $pdo->pdo()->prepare($sql);

        }else{
            $sql = "SELECT * FROM port WHERE familyname like :familyname";
            $stmt = $pdo->pdo()->prepare($sql);
            $stmt->bindValue(":familyname",'%'.$familyname.'%');    
        }

    $stmt->execute();
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
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
                    <h3>会員管理</h3>
                </div>
                <button type="button" class="btn btn-gray" onclick="location.href='../system_corporate/corporate-site/admin/download.php'">CSV出力</button>
            <form class="serch" action="users.php" method="POST">
                <input type="text" name="familyname" placeholder="名前検索">
                <button type="submit" class="btn btn-blue">検索</button>
            </form>
            <div class="list">
                    <table>
                        <thead>
                            <tr>
                                <th>por_id</th>
                                <th>名前</th>
                                <th>生年月日</th>
                                <th>ユーザーネーム</th>
                                <th>メールアドレス</th>
                                <!-- <th>パスワード</th> -->
                                <th>電話番号</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($users as $user): ?>
                            <tr>
                                <td><?php echo $user['por_id']; ?></td>
                                <td><?php echo $user['familyname']; ?>
                                <?php echo $user['firstname']?></td>
                                <td><?php echo $user['day']; ?></td>
                                <td><?php echo $user['user_name']; ?></td>
                                <td><?php echo $user['email']; ?></td>
                                <td><?php echo $user['tel']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-red delete_users" data-id=<?php echo $user['por_id']; ?>>削除</button>                            </tr>
                                    <form method="POST" action="../system_corporate/corporate-site/admin/delete_users.php" id="delete_form_<?php echo $user['por_id']; ?>">
                                        <input type="hidden" value="<?php echo $user['por_id']; ?>" name="por_id">
                                    </form>
                                </td>
                            </tr>
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
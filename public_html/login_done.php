<?php
session_start();
// セッション変数 $_SESSION["loggedin"]を確認。ログイン済だったらウェルカムページへリダイレクト
if(empty($_SESSION["loggedin"])){
    header("location: login_html/login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>櫻坂ハウス</title>
    <link rel="stylesheet" type="text/css" href="../system/slick/slick/slick.css">
    <link rel="stylesheet" type="text/css" href="../system/slick/slick/slick-theme.css" />
    <link rel="stylesheet" href="css/style.css">

</head>
<header>
    <h1 class="headername">
        <img src="img/img07.jpg" ait="写真" width="35" height="40" align="center">
        櫻坂ハウス
    </h1>
    <div class="header_container">
        <a href="http://localhost:8888/DT/sakura">
            <img class="headerlog" src="img/img07.jpg" ait="写真" width="45" height="55" align="left">
        </a>
        <nav class="pc-nav">
            <li class="alet"><a href="https://sakurazaka46.com/s/s46/news/list?ima=0000&dy=202404">NEWS</a></li>
            <li class="alet"><a href="https://sakurazaka46.com/s/s46/diary/blog/list?ima=0000">BLOG</a></li>
            <li class="alet"><a href="https://store.plusmember.jp/sakurazaka46/">GOODS</a></li>
            <li class="alet"><a href="https://sakurazaka46.com/s/s46/page/about_fanclub?ima=0000">FANCLUB</a></li>
            <li class="alet"><a href="https://sakurazaka46.com/s/s46/diary/live_page/list?ima=0000">LIVE</a></li>
            <li class="alet"><a href="https://sakurazaka46.com/s/s46/artist/00/discography?ima=0000">DISCOGRAPHY</a></li>
            <li class="alet"><a href="https://sakurazaka46.com/s/s46/search/artist?ima=0000">MEMBER</a></li>
            <li class="alet"><a href="https://sakurazaka46.com/s/s46/diary/tv2?ima=0000">TV</a></li>
        </nav>
    </div>
</header>

<body>
    <a class="menu">
        <span class="menu__line menu__line--top"></span>
        <span class="menu__line menu__line--center"></span>
        <span class="menu__line menu__line--bottom"></span>
    </a>
    <nav class="gnav">
        <div class="gnav__wrap">
                <ul class="gnav__menu">
                <li class="alet"><a href="https://sakurazaka46.com/s/s46/news/list?ima=0000&dy=202404">NEWS</a></li>
                <li class="alet"><a href="https://sakurazaka46.com/s/s46/diary/blog/list?ima=0000">BLOG</a></li>
                <li class="alet"><a href="https://store.plusmember.jp/sakurazaka46/">GOODS</a></li>
                <li><a href="account_html/mypage.php">MYPAGE</a></li>
            </ul>
            <ul class="gnav__menu">
                <li class="alet"><a href="https://sakurazaka46.com/s/s46/page/about_fanclub?ima=0000">FANCLUB</a></li>
                <li class="alet"><a href="https://sakurazaka46.com/s/s46/diary/live_page/list?ima=0000">LIVE</a></li>
                <li class="alet"><a href="https://sakurazaka46.com/s/s46/artist/00/discography?ima=0000">DISCOGRAPHY</a></li>
                <li class="alet"><a href="https://sakurazaka46.com/s/s46/search/artist?ima=0000">MEMBER</a></li>
                <li class="alet"><a href="https://sakurazaka46.com/s/s46/diary/tv2?ima=0000">TV</a></li>
            </ul>
        </div>
    </nav>
    <section>
        <div class="description">
            <div class="top-hero">
                <div class="elem-visual">
                    <a href="https://sakurazaka46.com/s/s46/page/backslive_8th" target class="alet">
                        <img src="img/sakuraBACKSLIVE.jpg" alt onmousedown="return false" onselectstart="return false"
                            oncontextmenu="return false">
                    </a>
                </div>
                <ul class="slide-items">
                    <li class="alet"><a href="https://store.plusmember.jp/sakurazaka46/"><img src="img/sakuraBACKS.jpg"alt="slide1"></a></li>
                    <li class="alet"><a href="https://sakurazaka46.com/s/s46/page/arenatour"><img src="img/sakuradorm.jpg" alt="slide1"></a></li>
                    <li class="alet"><a href="https://sakurazaka46.com/s/s46/page/3rd_anniv_bd"><img src="img/sakuraLive.jpg" alt="slide1"></a></li>
                    <li class="alet"><a href="https://sakurazaka46.com/s/s46/page/8th_single"><img src="img/sakuraTEN.jpg" alt="slide1"></a></li>
                    <li class="alet"><a href="https://store.plusmember.jp/sakurazaka46/"><img src="img/sakuraGU.jpg" alt="slide1"></a></li>
                    <li class="alet"><a href="https://sakurazaka46.com/s/s46/page/about_fanclub?ima=0000"><img src="img/sakuraLogin.jpg"alt="slide1"></a></li>
                    <li class="alet"><a href="https://www.aeon.co.jp/campaign_ex/sakurazaka46/?dpd=1900&cmp=123152&agr=8946630&ad=22000962"><img src="img/sakuraION.jpg"alt="slide1"></a></li>
                </ul>
            </div>
        </div>
    </section>
    <section>
        <div class="history">
            <h1>櫻坂46の軌跡</h1>
        </div>
        <div class="cd-top">
            <a href=""></a><img src="img/img-cd07.jpg">
            <a href=""></a><img src="img/img-cd06.jpg">
            <a href=""></a><img src="img/img-cd.jpg">
        </div>
            <div class="cp_timeline04">
                <div class="timeline_item">
                    <div class="time_date">
                        <p class="time">2023</p>
                        <p class="flag">海外進出、世界に櫻の名前が、、、</p>
                    </div>
                    <div class="desc">
                        <p>この年から3期生が加入し、新しい色がまた加わった。<br>
                            この年は、なんと3枚のシングルが発売された。5stシングル「桜月」6stシングル「Start over」7stシングル「承認欲求」が発売。<br>
                            5枚目では、坂道研究生として初のセンター<span>守屋麗奈</span>が抜擢。守屋麗奈は、あざといキャラで多くの人を魅了してるが楽曲では、
                            優しくそして強いそんな表現ができるセンターだ。<br>
                            6枚目の初のセンターをしたのは、<span>藤吉夏鈴だ</span>。彼女は、唯一無二の存在で表現力の神とされている。彼女もまた、四天王の一人だ。<br>
                            7枚目シングルのセンターは今まで櫻坂の1枚目、2枚目とシングルのセンターを務めてきた女王。<span>森田ひかる</span>。<br>
                            彼女は、小柄ながらステージ全てを使うような大きなパフォーマンスをし、<span>四天王の一人</span>である、圧倒的存在感を魅せる櫻坂のエースだ。<br>
                            この年、櫻坂46はパリ、マレーシアのフェスに参加し初の海外ライブを大成功に収め、<br>
                            海外進出を決めた。<br>
                            3期生を表題曲に加わりますます力をつける櫻坂46。これからはさらに目が離させないだろう。<br>
                            櫻坂には歴代センターの強み、そしてグループ愛、Baddiesの応援があるからだ。

                        </p>
                    </div>
                </div>
                <div class="cd-top">
                    <a href=""></a><img src="img/img-cd04.jpg">
                    <a href=""></a><img src="img/img-cd08.jpg">
                </div>        
            <div class="timeline_item">
                <div class="time_date">
                    <p class="time">2022</p>
                    <p class="flag">別れ、そして櫻坂の第二章の幕開け</p>
                </div>
                <div class="desc">
                    <p>この年でも新たなセンターが誕生した。4stシングル「五月雨よ」<span>センター山﨑天</span>。<br>
                        山﨑天は、ダンスがグループ内でもTOPを争うぐらいのレベルだ。彼女は、驚異的なダンスでファンを沸かせるパフォーマンス力の持ち主だ。<br>
                        彼女もまた、<span>四天王のひとりだ</span>。<br>
                        そして、長年キャプテンを務めてきた菅井友香が卒業をし、2期生の松田里奈がキャプテンに就任。<br>
                        そして、この年ではグループ初のアルバム「As you know?」が発売。このセンターには、森田ひかると山﨑天の通称るんてんがダブルセンターを務めた。<br>
                        また、新しくなった櫻坂46、彼女たちは<span>更なる進化を魅せることになる</span>。                   
                    </p>
                </div>
            </div>
            <div class="cd-top">
                <a href=""></a><img src="img/img-cd03.jpg">
                <a href=""></a><img src="img/img-cd05.jpg">
            </div>        

            <div class="timeline_item">
                <div class="time_date">
                    <p class="time">2021</p>
                    <p class="flag">櫻に色が加わる</p>
                </div>
                <div class="desc">
                    <p>櫻坂46の新体制が発表され、新しく松田里奈が副キャプテンに就任。<br>
                        この年は、2stシングル「BAN」3stシングル「流れ弾」を発売。この年での出来事は、これからの櫻坂46の在り方を見せてくれたと思う。<br>
                        3stシングル「流れ弾」でセンターを務めた<span>田村保乃</span>は、曲の中で豹変し観ている人を作品の中に取り込む力がある。<br>
                        Buddiesの間で言われている<span>四天王のひとりだ</span>。
                    </p>
                </div>
            </div>
            <div class="cd-top">
                <a href=""></a><img src="img/img-cd02.jpg">
            </div>        

            <div class="timeline_item">
                <div class="time_date">
                    <p class="time">2020</p>
                    <p class="flag">櫻が咲き始める</p>
                </div>
                <div class="desc">
                    <p>2020年10月欅坂46はラストライブをもって活動休止をした。<br>
                        そして、同月の14日、新たなグループ名「櫻坂46」の活動を開始した。<br>
                        12月に1stシングル「Nobody's falut」を発売。センターは2期生の森田ひかるに決まった。<br>
                        櫻坂46になって新しい試みを始める。それは、センター3人制だ。<br>
                        表題曲には、森田ひかる。カップリング曲「Buddies」には、2期生の山﨑天。「なぜ 恋をして来なかったんだろう」には、2期生の藤吉夏鈴が務めた。
                    </p>
                </div>
            </div>
            <a href="tweet/tweet_top.php">
            <button class="btn-l">投稿!<br>閲覧!</button>
        </a>

        </div>
    <footer>
        <input type="submit" onclick="location.href='info_html/consultation.php'"  value="お問い合わせ" />
        <a href="login_html/logout.php">
            <input type="submit" value="ログアウト" />
        </a>    
        <p>&seed&foor</p>
    </footer>
        <a href="tweet/tweet_top.php">
            <button class="btn">投稿!<br>閲覧!</button>
        </a>
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js/java.js"></script>
    <script type="text/javascript" src="../system/slick/slick/slick.min.js"></script>
</body>

</html>
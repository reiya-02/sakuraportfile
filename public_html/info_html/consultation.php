<!DOCTYPE html>
<html lang="ja" dir="ltr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>新規登録登録</title>
<link rel="stylesheet" href="../login_html/css2/style.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>

<body>            
    <form action="questConfirm.php" method="post" name="form">
        <div class="container">
            <h2 class="header">お問い合わせ</h2>
            <p>登録内容をご確認の上、</p>
            <p>「確認画面へ」ボタンをクリックしてください。</p>
                <div class="bel">
                    <label>お名前<span>＊必須</span></label>
                    <input type="text" name="name"  class="name" value="">
                </div>
                <div class="bel">
                    <label>メールアドレス<span>＊必須</span></label>
                    <input type="text" name="email"  class="email" value="">
                </div>
                <label>お問い合わせ内容<span>必須</span></label>
                <div class="st">
                    <label class="quest">
                        <select name="question">
                            <option value="運営へのご意見">運営へのご意見</option>
                            <option value="サイトに追加して欲しい機能">サイトに追加して欲しい機能</option>
                            <option value="その他">その他<option>
                        </select>
                    </label>
                </div>
                    <label>質問内容<span>必須</span></label>
                    <textarea name="content" cols="40" rows="6"></textarea>
            <button type="submit"><a>確認画面へ</a></button><br>
            <button><a href="../index.html">ホームへ戻る</a></button>
        </div>
    </form>

</body>
</html>
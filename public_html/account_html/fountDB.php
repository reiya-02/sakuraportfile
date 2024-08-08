<?php
session_start();

if(isset($_FILES['fileToUpload'])){
    $target_dir = "images/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    // 画像ファイルをディレクトリに保存
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        // 画像のパスをセッションに保存
        $_SESSION['uploaded_image'] = $target_file;
        echo $target_file;
    } else {
        echo "画像の保存に失敗しました。";
    }
} else if (isset($_SESSION['uploaded_image'])) {
    // セッションから画像のパスを取得
    echo $_SESSION['uploaded_image'];
}
?>

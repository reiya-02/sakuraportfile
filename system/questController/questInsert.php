<?php
// namespace sakura_dummy;

require_once('../../system/Controller/Connect.php');  /* DB接続用のファイルを読み込む */
require_once('questController.php');  /* DB接続用のファイルを読み込む */

if(!empty($_POST)){
  try{
    $sql = "
            INSERT INTO quest(
              name,
              email,
              question,
              content,
              created_at
            )
            VALUES(
              :name,
              :email,
              :question,
              :content,
              :created_at
            )";

        $obj = new questController();
        $obj->insert_sortable($sql, $_POST['name'], $_POST['email'], $_POST['question'], $_POST['content'], null);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
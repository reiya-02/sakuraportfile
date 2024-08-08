<?php
// namespace sakura_dummy;

require_once('../../system/Controller/Connect.php');
require_once('sakuraController.php');  /* DB接続用のファイルを読み込む */

if(!empty($_POST)){
  try{
    $sql = "
            INSERT INTO tweets(
              user_name,
              category_id,
              tweet,      
              created_at
            )
            VALUES(
                :user_name,
                :category_id,
                :tweet,      
                :created_at
            )";

        $obj = new sakuraController();
        $obj->insert_sortable($sql, $_POST['user_name'], $_POST['category_id'], $_POST['tweet'], null);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
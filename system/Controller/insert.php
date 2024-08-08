<?php
// namespace sakura_dummy;

require_once('Connect.php');  /* DB接続用のファイルを読み込む */
require_once('AppController.php');  /* DB接続用のファイルを読み込む */

if(!empty($_POST)){
  try{
    $sql = "
            INSERT INTO port(
              familyname,
              firstname,
              day,
              user_name,
              email,
              password,
              tel,
              regist_date
            )
            VALUES(
              :familyname,
              :firstname,
              :day,
              :user_name,
              :email,
              :password,
              :tel,
              :regist_date
            )";

        $obj = new AppController();
        $obj->insert_sortable($sql, $_POST['familyname'], $_POST['firstname'], $_POST['day'], 
        $_POST['user_name'], $_POST['email'], $_POST['password'], $_POST['tel'], null);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
}
<?php
require_once('Connect.php');  
require_once('tweetController.php');  
// echo '<pre>';
// var_dump($_POST);
// echo '</pre>';

if(!empty($_POST)){
    try{
      $sql = "
            SELECT * FROM tweets(
              category_id,
              tweet
            )
            WHERE(
              :category_id,
              :tweet
            )";

            $obj = new SelectData();
            $obj->select($sql);
      } catch (PDOException $e) {
      echo $e->getMessage();
    }
}

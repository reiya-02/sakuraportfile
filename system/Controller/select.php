<?php
require_once('Connect.php');  
require_once('selectController.php');  

if(!empty($_POST)){
    try{
      $sql = "
              SELECT * FROM port(
                email,
                password,
              )
              WHERE(
                :email,
                :password,
              )";
  
          $obj = new selectController();
          $obj->select_sortable($sql, $_POST['email'], $_POST['password']);
    } catch (PDOException $e) {
      echo $e->getMessage();
    }
}

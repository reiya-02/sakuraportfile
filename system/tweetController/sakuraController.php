<?php
// namespace sakura_dummy;


class sakuraController extends Connect
{
  /* 新規登録 */
  public function insert_sortable($sql, $user_name, $category_id, $tweet, $created_at = null){
    $stmt = $this->pdo()->prepare($sql);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':category_id', $category_id, PDO::PARAM_STR);
    $stmt->bindValue(':tweet', $tweet, PDO::PARAM_STR);
    $stmt->bindValue(':created_at', $created_at, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
  }
}
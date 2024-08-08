<?php
// namespace sakura_dummy;


class tweetController extends Connect
{
  /* 新規登録 */
  public function select_sortable($sql, $category_id, $tweet){
    $stmt = $this->pdo()->prepare($sql);
    $stmt->bindValue(':category_id', $category_id, PDO::PARAM_STR);
    $stmt->bindValue(':tweet', $tweet, PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
  }
}
<?php
// namespace sakura_dummy;


class questController extends Connect
{
  /* 新規登録 */
  public function insert_sortable($sql, $name, $email, $question, $content, $created_at = null){
    $stmt = $this->pdo()->prepare($sql);
    $stmt->bindValue(':name', $name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':question', $question, PDO::PARAM_STR);
    $stmt->bindValue(':content', $content, PDO::PARAM_STR);
    $stmt->bindValue(':created_at', $created_at, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
  }
}
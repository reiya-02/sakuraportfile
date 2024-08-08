<?php
// namespace sakura_dummy;


class selectController extends Connect
{
  /* 新規登録 */
  public function select_sortable($sql, $email, $password, $regist_date = null){
    $stmt = $this->pdo()->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':regist_date', $regist_date, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
  }
}
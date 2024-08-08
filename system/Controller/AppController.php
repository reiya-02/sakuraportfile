<?php
// namespace sakura_dummy;


class AppController extends Connect
{
  /* 新規登録 */
  public function insert_sortable($sql, $familyname, $firstname, $day, $user_name, $email,
  $password, $tel, $regist_date = null){
    $stmt = $this->pdo()->prepare($sql);
    $stmt->bindValue(':familyname', $familyname, PDO::PARAM_STR);
    $stmt->bindValue(':firstname', $firstname, PDO::PARAM_STR);
    $stmt->bindValue(':day', $day, PDO::PARAM_STR);
    $stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->bindValue(':tel', $tel, PDO::PARAM_INT);
    $stmt->bindValue(':regist_date', $regist_date, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
  }
}
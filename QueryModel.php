<?php

require_once __DIR__ . '/Database.php';

/**
 * Perform queries on post table.
 */
class QueryModel extends Database {

  /**
   * Constructor function to use the connection with database.
   */
  function __construct() {
    parent::__construct();
  }

  /**
   * Check user exist or not.
   *
   * @param string $email.
   *   User's email.
   *
   * @return boolean
   *   True if user exists.
   */
  public function isExistingUser(string $user_name): bool {
    try {
      $sql = $this->conn->prepare("select user_name from user where user_name = ?");
      $sql->execute([$user_name]);
      if ($sql->rowCount() > 0) {
        return TRUE;
      }
      return FALSE;
    } catch (Exception) {
      echo 'Error in database.';
    }
  }

  /**
   * Check user is valid or not.
   *
   * @param string $email.
   *   User's email.
   * @param string $password.
   *   User's password.
   *
   * @return boolean.
   *   True if user email and password match.
   */
  public function isValidUser(string $user_name, string $password): bool {
    try {
      $sql = $this->conn->prepare("select password from user where user_name = ?");
      $sql->execute([$user_name]);

      if($sql->rowCount() == 0) {
        return FALSE;
      }
      else {
        $res = $sql->fetch(PDO::FETCH_ASSOC);
        if(password_verify($password, $res['password'])) {
          return TRUE;
        }
        else {
          return FALSE;
        }
      }
    }
    catch (Exception $err) {
      return false;
    }
  }

  /**
   * Check user is an admin or not.
   *
   * @param string $email
   *   USer's email.
   *
   * @return bool
   *   Return TRUE if user is an admin, else FALSE.
   */
  public function isAdmin(string $user_name): bool {
    $sql = $this->conn->prepare("select is_admin from user where user_name = ?");
    $sql->execute([$user_name]);
    $res = $sql->fetch(PDO::FETCH_ASSOC);
    if($res['is_admin'] == 1) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Get user's data.
   *
   * @param string $email.
   *   User's email.
   *
   * @return array.
   *   User's data.
   */
  public function getUserData(string $user_name): array|null {
    try {
      $sql = $this->conn->prepare("Select full_name, is_admin, is_admin from user where user_name = ?");
      $sql->execute([$user_name]);
      $res = $sql->fetch(PDO::FETCH_ASSOC);
      return $res;
    }
    catch (Exception) {
      return null;
    }
  }

  /**
   * Fetch books in a selected range.
   *
   * @param int $lastId.
   *  Id of the last book that were fetched previously.
   * @param int $count.
   *  No. of books to be fetched.
   *
   * @return mixed.
   *   Return books array or null in case no post available.
   */
  public function fetchBooksByLimit(int $lastId, int $count): array|null {
    try {
      $sql = $this->conn->prepare("select * from book where id > $lastId order by id asc limit $count");
      $sql->execute();
      $res = $sql->fetchAll(PDO::FETCH_ASSOC);
      return $res;
    }
    catch (Exception) {
      return null;
    }
  }

  /**
   * Add book id to user's bucket list.
   *
   * @param string $user_name
   *   User's user name.
   * @param int $book_id
   *   Books id.
   */
  public function addBookToBucket(string $user_name, int $book_id) {
    $sql = $this->conn->prepare("insert into bucket values(?, ?)");
    $sql->execute([$user_name, $book_id]);
  }

}

<?php

require_once __DIR__ . '/QueryModel.php';

/**
 * Controller for adding books to bucket list.
 */
class AddToBucketController {

  private $db;

  /**
   * Constructor function to create object of QueryModel.
   */
  public function __construct() {
    $this->db = new QueryModel();
  }

  /**
   * Fonction for adding books to bucket list.
   */
  public function invoke() {
    session_start();
    $user_name = $_SESSION['user_name'];
    $book_id = $_POST['id'];
    echo $user_name . ' ' . $book_id;
    $this->db->addBookToBucket($user_name, $book_id);
  }
}

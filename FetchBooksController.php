<?php

require_once __DIR__ . '/QueryModel.php';

/**
 * Fetch books.
 */
class FetchBooksController {

  private $db;
  private $userData;

  /**
   * Constructor function to create object of QueryModel.
   */
  function __construct() {
    $this->db = new QueryModel();
  }

  /**
   * Fetch books.
   */
  public function invoke() {
    $lastId = $_POST['last-id'];
    $books = $this->db->fetchBooksByLimit($lastId, 9);
    if(empty($books)) {
      echo '0';
    }
    else {
      require_once __DIR__ . '/Book_view.php';
    }
  }
}

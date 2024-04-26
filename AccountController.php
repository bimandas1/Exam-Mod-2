<?php

require_once __DIR__ . '/QueryModel.php';

/**
 * Control account details.
 */
class AccountController {

  private $db;
  private $userData;

  /**
   * Constructor function to create object of QueryModel.
   */
  function __construct() {
    $this->db = new QueryModel();
  }

  /**
   * Controle user's account details.
   */
  public function invoke() {
    session_start();
    if(isset($_SESSION['user_name'])) {
      $user_name = $_SESSION['user_name'];
      // Fetch user data.
      $this->userData = $this->db->getUserData($user_name);
      // If user is an admin.
      if($this->userData['is_admin'] == 1) {
        header('location: /add-book');
      }
      else {
        // View of account page.
        require_once __DIR__ . '/account_view.php';
      }
    }
    else {
      header('location: /login');
    }
  }
}

<?php

require_once __DIR__ . '/QueryModel.php';

/**
 * Home controller.
 */
class HomeController {

  private $db;
  private $userData;

  /**
   * Constructor function to create object of QueryModel.
   */
  function __construct() {
    $this->db = new QueryModel();
  }

  /**
   * Controls books show and filters.
   */
  public function invoke() {
    session_start();
    if (isset($_SESSION['user_name'])) {
      $user_name = $_SESSION['user_name'];
      // Fetch user data.
      $this->userData = $this->db->getUserData($user_name);
      // If user is an admin.
      if ($this->userData['is_admin'] == 1) {
        header('location: /add-book');
      }
      else {
        // View of home page.
        require_once __DIR__ . '/home_view.php';
      }
    }
    else {
      header('location: /login');
    }
  }
}

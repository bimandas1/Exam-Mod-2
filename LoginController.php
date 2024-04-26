<?php

require_once __DIR__ . '/Session.php';

/**
 * Control user login.
 */
class LoginController
{

  private $message;

  /**
   * Constructor function to set default values.
   */
  function __construct()
  {
    $this->message = null;
    // Destroy session.
    $session = new Session();
    $session->destroySession();
  }

  /**
   * Function to control user login.
   */
  public function invoke()
  {
    if (isset($_POST['email'])) {
      $email = $_POST['email'];
      $password = $_POST['password'];

    //   // Initialize object of QueryModel.
      require_once __DIR__ . '/QueryModel.php';
      $db = new QueryModel();
      // If valid user.
      if ($db->isValidUser($email, $password) === TRUE) {
        session_start();
        $_SESSION['user_name'] = $email;
        // if ($db->isAdmin($email)) {
        //   $_SESSION['is_admin'] = TRUE;
        // }
        // Redirect to account page.
        header('location: /account');
      }
      else {
        $this->message = 'Email id or password not matched';
      }
    }

    // Require login view.
    require_once __DIR__ . '/login_view.php';
  }
}

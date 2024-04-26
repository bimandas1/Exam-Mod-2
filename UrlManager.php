<?php

require_once __DIR__ . '/LoginController.php';
require_once __DIR__ . '/AccountController.php';
require_once __DIR__ . '/HomeController.php';
require_once __DIR__ . '/FetchBooksController.php';
require_once __DIR__ . '/AddToBucketController.php';

/**
 * Manage paths and require pages.
 */
class UrlManager
{

  /**
   * Require pages accourding to the path.
   *
   * @param string $page
   *   Path of the page.
   */
  public function load(string $page)
  {
    switch ($page) {
      case '':
      case 'login':
        $loginController = new LoginController();
        $loginController->invoke();
        break;

      case 'account':
        $accountController = new AccountController();
        $accountController->invoke();
        break;

      case 'home':
        $homeController = new HomeController();
        $homeController->invoke();
        break;

      case 'fetch-books':
        $fetchBooksController = new FetchBooksController();
        $fetchBooksController->invoke();
        break;

      case 'add-to-bucket':
        $addToBucketController = new AddToBucketController();
        $addToBucketController->invoke();
        break;

      default:
        header('HTTP/1.0 404 not found');
    }
  }
}

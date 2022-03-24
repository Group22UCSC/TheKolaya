<?php
/*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
class App
{
  protected $currentController = 'Index';
  protected $controller = 'Index';
  protected $currentMethod = 'index';
  protected $params = [];

  public function __construct()
  {
    //print_r($this->getUrl());

    $url = $this->getUrl();
    // Look in controllers for first value
    if (!empty($url)) {
      if (file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
        // If exists, set as controller
        $users = array('Accountant', 'Admin', 'Agent', 'Landowner', 'Manager', 'Productmanager', 'Supervisor');

        $controller = ucwords($url[0]);
        if ($controller == $users[0] || $controller == $users[1] || $controller == $users[2] || $controller == $users[3] || $controller == $users[4] || $controller == $users[5] || $controller == $users[6]) {
          if (isLoggedIn()) {
            $previsous_userType = $_SESSION['user_type'];
            if($previsous_userType == ucwords($url[0]))
              $this->currentController = ucwords($url[0]);
            else
              $this->currentController = 'Login';
          }else {
            $this->currentController = 'Login';
          }
        }else {
          $this->currentController = ucwords($url[0]);
        }
        // Unset 0 Index
        unset($url[0]);
      }
    }


    // Require the controller
    require_once '../app/controllers/' . $this->currentController . '.php';
    $this->controller = $this->currentController;

    // Instantiate controller class
    $this->currentController = new $this->currentController;
    $this->currentController->loadModelUser($this->controller);

    // Check for second part of url
    if (isset($url[1])) {
      // Check to see if method exists in controller
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        // Unset 1 index
        unset($url[1]);
      }
    }

    // Get params
    $this->params = $url ? array_values($url) : [];

    // Call a callback with array of params
    call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
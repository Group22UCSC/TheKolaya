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
            $this->currentController = ucwords($url[0]);
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

//   class App {

//     private $_url = null;
//     private $_controller = null;

//     function __construct()
//     {
//         $this->_getURL();

//         if(empty($this->_url[0])) {
//             $this->_loadDefaultController();
//             return false;
//         }

//         if($this->_loadController()) {
//             $this->_loadControllerMethod();
//         }
//     }


//     private function _getURL() {
//         $url = isset($_GET["url"]) ? $_GET["url"] : null;

//         $url = rtrim($url, '/');

//         $url = filter_var($url, FILTER_SANITIZE_URL); //ex: $_url = controller/home/...

//         $this->_url = explode('/', $url); //Split from '/' this and put url words in array. now $_url = [0=>controller, 1=> home,....]
    
//         // print_r($this->_url);
//     }

//     private function _loadDefaultController() {
//         require '../app/controllers/Index.php';

//         $this->_controller = new Index();

//         $this->_controller->index();
//     }

//     private function _loadController() {
//         $file = null;
//         $this->_url[0] = ucfirst($this->_url[0]);
//         if($this->_url[0] == 'Login' || $this->_url[0] == 'Registration' || $this->_url[0] == 'OtpVerify') {
//             $file = '../app/controllers/'. $this->_url[0] . '.php';
//         }else if(isset($_SESSION['user_type'])){
//             $file = '../app/controllers/'. $_SESSION['user_type'].'/'. $this->_url[0] . '.php';
//         }else {
//             $this->_url = [];
//             $this->_url[0] = 'Login';
//             $file = '../app/controllers/'.$this->_url[0].'.php';
//         }

//         if(file_exists($file)) {
//             require_once $file;
//             $this->_controller = new $this->_url[0];
//             if($this->_url[0] == 'Login' || $this->_url[0] == 'Registration' || $this->_url[0] == 'OtpVerify') {
//                 $this->_controller->loadModelUser($this->_url[0]);
//             }else if(!empty($_SESSION['user_type'])) {
//                 $this->_controller->loadModel($_SESSION['user_type'],$this->_url[0]);
//             }
//             return true;
//         }
//         else {

//             require '../app/controllers/Errors.php';
//             $this->_controller = new Errors();

//             $this->_controller->index();
//             return false;
//         }
//     }

//     private function _loadControllerMethod() {
//         $urlLength = count($this->_url);

//         if($urlLength > 1) {
//             if (!method_exists($this->_controller, $this->_url[1])){
//                 echo "Request method not found!!";
//                 exit;
//             }
//         }

//         switch($urlLength) {
//             case 6:
//                 $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5]);
//                 break;
//             case 5:
//                 $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
//                 break;
//             case 4:
//                 $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
//                 break;
//             case 3:
//                 $this->_controller->{$this->_url[1]}($this->_url[2]);
//                 break;
//             case 2:
//                 $this->_controller->{$this->_url[1]}();
//                 break;
//             default:
//                 $this->_controller->index();
//                 break;
//         }
//     }
// }
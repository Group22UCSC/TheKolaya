<?php
// header('Cache-Control: no cache'); //no cache
// session_cache_limiter('private_no_expire'); // works
// session_cache_limiter('public'); // works too
session_start();
date_default_timezone_set("Asia/Colombo");

// Flash message helper
// EXAMPLE - flash('register_success', 'You are now registered');
// DISPLAY IN VIEW - echo flash('register_success');
// function flash($name = '', $message = '', $class = 'alert alert-success'){
//   if(!empty($name)){
//     if(!empty($message) && empty($_SESSION[$name])){
//       if(!empty($_SESSION[$name])){
//         unset($_SESSION[$name]);
//       }

//       if(!empty($_SESSION[$name. '_class'])){
//         unset($_SESSION[$name. '_class']);
//       }

//       $_SESSION[$name] = $message;
//       $_SESSION[$name. '_class'] = $class;
//     } elseif(empty($message) && !empty($_SESSION[$name])){
//       $class = !empty($_SESSION[$name. '_class']) ? $_SESSION[$name. '_class'] : '';
//       echo '<div class="'.$class.'" id="msg-flash">'.$_SESSION[$name].'</div>';
//       unset($_SESSION[$name]);
//       unset($_SESSION[$name. '_class']);
//     }
//   }
// }

function flash($name)
{
  $_SESSION['flash_message'] = 'hello';
  switch ($name) {
    case 'session_destroied':
      $_SESSION['flash_message'] = "Session Is Destroyed !";
      break;
    case 'OTP':
      $_SESSION['flash_message'] = "OTP Session Is Destroyed, Try Again !";
      break;
  }
  return $_SESSION['flash_message'];
}

function isLoggedIn()
{
  if (isset($_SESSION['user_type'])) {
    return true;
  } else {
    return false;
  }
}

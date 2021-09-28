<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     
   </head>
<body>
  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name"><img src="<?php echo URL?>vendors/images/thekolaya-white.png" alt=""></div>
        <i class="fas fa-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="<?php echo URL?>accountant">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      
     <li>
       <a href="<?php echo URL?>/accountant/requests">
        <i class="far fa-registered fa-2x"></i>
         <span class="links_name">Requests</span>
       </a>
       <span class="tooltip">Requests</span>
     </li>
     <li>
       <a href="<?php echo URL?>accountant/payments">
        <i class="fas fa-hand-holding-usd fa-2x"></i>
         <span class="links_name">Payments</span>
       </a>
       <span class="tooltip">Payments</span>
     </li>
     <li>
       <a href="<?php echo URL?>accountant/setTeaPrice">
        <i class="fa fa-dollar-sign fa-2x"></i>
         <span class="links_name">Tea Price</span>
       </a>
       <span class="tooltip">Tea Price</span>
     </li>
     <li>
      <a href="#">
       <i class="fas fa-chart-line fa-2x"></i>
        <span class="links_name">Stock</span>
      </a>
      <span class="tooltip">Stock</span>
    </li>
     <li>
      <a href="<?php echo URL?>/accountant/landowners">
       <i class="fas fa-user-tie fa-2x"></i>
        <span class="links_name">Landowners</span>
      </a>
      <span class="tooltip">Landowners</span>
    </li>
     <li class="mobile-nav-icon">
      <a href="#">
        <i class="fas fa-bell"></i>
        <span class="links_name">Notification</span>
      </a>
      <span class="tooltip">Notification</span>
    </li>
    <li class="mobile-nav-icon">
      <a href="#">
        <i class="fas fa-user"></i>
        <span class="links_name">Profile</span>
      </a>
      <span class="tooltip">Profile</span>
    </li>
     <li>
       <a href="<?php echo URL?>login/logout"">
        <i class="fas fa-sign-out-alt"></i>
         <span class="links_name">Logout</span>
       </a>
       <span class="tooltip">Logout</span>
     </li>
     <!-- <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li> -->
    </ul>
  </div>
  <section class="home-section">
      <div class="header">
        <div class="thekolya-logo"><img src="<?php echo URL?>/vendors/images/thekolaya.png" alt=""></div>
        <ul>
          <li class="bell-notification"><i class="fas fa-bell"></i></li>
          <li class="profile">
            <div class="profile-container">
              <div class="profile-details">
                <div class="name_job">
                  <div class="name">Melaka<br><span>Accountant</span></div>
                </div>
                <img src="<?php echo URL?>/vendors/images/accountant/profile.jpg" alt="profileImg">
              </div>
            </div>
          </li>
        </ul>
      </div>
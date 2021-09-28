<!DOCTYPE html>
<!-- Created by CodingLab |www.youtube.com/c/CodingLabYT-->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent.css">
    <!-- Boxicons CDN Link -->
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
        <a href="<?php echo URL?>Agent">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <li>
       <a href="<?php echo URL?>Agent/availableLandownerList">
        <i class="fa fa-list" aria-hidden="true"></i>
         <span class="links_name">Available Landowners</span>
       </a>
       <span class="tooltip">Available Landowners</span>
     </li>
     <li>
       <a href="<?php echo URL?>Agent/updateTeaWeight">
        <i class="fa fa-balance-scale" aria-hidden="true"></i>
         <span class="links_name">Initial Tea Weight</span>
       </a>
       <span class="tooltip">Initial Tea Weight</span>
     </li>
     <li>
       <a href="<?php echo URL?>Agent/sendEmergencyMessage">
        <i class="fa fa-envelope" aria-hidden="true"></i>
         <span class="links_name">Emergency Message</span>
       </a>
       <span class="tooltip">Emergency Message</span>
     </li>
     <li>
       <a href="<?php echo URL?>Agent/confirmDeliverables">
        <i class="fa fa-check-square" aria-hidden="true"></i>
         <span class="links_name">Confirm Deliverables</span>
       </a>
       <span class="tooltip">Confirm Deliverables</span>
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
       <a href="#">
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
        <div class="thekolya-logo"><img src="<?php echo URL?>vendors/images/thekolaya.png" alt=""></div>
        <ul>
          <li><i class="fas fa-bell"></i></li>
          <li class="profile">
            <div class="profile-details">
              <div class="name_job">
                <div class="name">Roneki<br><span>Agent</span></div>
              </div>
              <img src="<?php echo URL?>vendors/images/agent/profile.jpg" alt="profileImg">
            </div>
          </li>
        </ul>
      </div>      
  

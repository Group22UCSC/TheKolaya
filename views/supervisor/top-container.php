<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Sidebar Menu  | CodingLab </title>
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
        <a href="#">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      
      <li>
       <a href="<?php echo URL?>supervisor/updateTeaMeasure">
        <i class="fas fa-weight"></i>
         <span class="links_name">Update Tea Measure</span>
       </a>
       <span class="tooltip">Update Tea Measure</span>
     </li>
     <li>
       <a href="#">
        <i class="fab fa-acquisitions-incorporated"></i>
         <span class="links_name">Requests</span>
       </a>
       <span class="tooltip">Requests</span>
     </li>
     <li>
       <a href="#">
        <i class="fas fa-tree"></i>
         <span class="links_name">Fertilizer</span>
       </a>
       <span class="tooltip">Fertilizer</span>
     </li>
     <li>
       <a href="#">
        <i class="fas fa-fire"></i>
         <span class="links_name">Firewood</span>
       </a>
       <span class="tooltip">Firewood</span>
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
        <div class="thekolya-logo"><img src="<?php echo URL?>/vendors/images/thekolaya.png" alt=""></div>
        <ul>
          <li class="bell-notification"><i class="fas fa-bell"></i></li>
          <li class="profile">
            <div class="profile-container">
              <div class="profile-details">
                <div class="name_job">
                  <div class="name">Kumud Perera<br><span>Supervisor</span></div>
                </div>
                <img src="<?php echo URL?>/vendors/images/supervisor/profile.jpg" alt="profileImg">
              </div>
            </div>
          </li>
        </ul>
      </div>
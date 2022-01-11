<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
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
        <a href="<?php echo URL?>manager/manager">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      
      <li>
       <a href="<?php echo URL?>manager/viewStock">
        <!-- <i class="fas fa-weight"></i> -->
        <i class="fas fa-box-open"></i>
         <span class="links_name">Stock Details</span>
       </a>
       <span class="tooltip">Stock Details</span>
     </li>
     <li>
        <a href="<?php echo URL?>manager/viewPayments">
        <i class="fas fa-hand-holding-usd"></i>
         <span class="links_name">Payments</span>
       </a>
       <span class="tooltip">Payments</span>
     </li>
     <li>
       <a href="<?php echo URL?>manager/viewTeaQuality">
      <i class="fas fa-book"></i>
         <span class="links_name">Tea Quality</span>
       </a>
       <span class="tooltip">Tea Quality</span>
     </li>
     <li>
        <a href="<?php echo URL?>manager/viewAccount">
        <!-- <i class="fas fa-fire"></i> -->
        <i class="fas fa-eye"></i>
         <span class="links_name">View Account</span>
       </a>
       <span class="tooltip">View Account</span>
     </li>
      
      <li>
      <a href="<?php echo URL?>manager/emergency">
      <i class="fa fa-envelope"></i>
         <span class="links_name">Emergency</span>
       </a>
       <span class="tooltip">Emergency</span>
     </li>
     
      <li>
      <a href="<?php echo URL?>manager/viewbuyer">
      <i class="fas fa-user-tie fa-2x"></i>
         <span class="links_name">View buyer details</span>
       </a>
       <span class="tooltip">View buyer details</span>
     </li>
    
    </ul>
  </div>
  <section class="home-section">
  <div class="wrapper">
        <div class="navbar">
          <div class="navbar_left">
            <div class="thekolya-logo"><img src="<?php echo URL?>vendors/images/thekolaya.png" alt=""></div>
          </div>
      
          <div class="navbar_right">
            <div class="notifications">
              <div id="bell" class="icon_wrap"><i class="far fa-bell"></i></div>
              
              <div class="notification_dd">
                  <ul class="notification_ul">
                      <?php
                        for($i = 0; $i < 4; $i++) {
                          echo '<li class="starbucks success">
                                  <div class="notify_icon">
                                    <span class="icon"><i class="fas fa-bell"></i></span>  
                                  </div>
                                  <div class="notify_data">
                                      <div class="title">
                                          Lorem, ipsum dolor.  
                                      </div>
                                      <div class="sub_title">
                                        Lorem ipsum dolor sit amet consectetur.
                                    </div>
                                  </div>
                                  <div class="notify_status">
                                      <p>Success</p>  
                                  </div>
                                </li>';
                        }
                      ?> 
                      <li class="show_all">
                          <p class="link">Show All Activities</p>
                      </li> 
                  </ul>
              </div>
              
            </div>
            <?php include '../app/views/user/profile/navBarProfile.php';?>
          </div>
        </div>
        
        <div class="popup">
          <div class="shadow"></div>
          <div class="inner_popup">
              <div class="notification_dd">
                  <ul class="notification_ul">
                      <li class="title">
                          <p>All Notifications</p>
                          <p class="close"><i class="fas fa-times" aria-hidden="true"></i></p>
                      </li>
                      <?php
                        for($i = 0; $i < 6; $i++) {
                          echo '<li class="starbucks success">
                                  <div class="notify_icon">
                                    <span class="icon"><i class="fas fa-bell"></i></span>  
                                  </div>
                                  <div class="notify_data">
                                      <div class="title">
                                          Lorem, ipsum dolor.  
                                      </div>
                                      <div class="sub_title">
                                        Lorem ipsum dolor sit amet consectetur.
                                    </div>
                                  </div>
                                  <div class="notify_status">
                                      <p>Success</p>  
                                  </div>
                                </li>';
                        }
                      ?>
                  </ul>
              </div>
          </div>
        </div>
        
      </div>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style2.css">
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/agent.css">
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/agent/notification.css">
<div class="sidebar">
  <div class="logo-details">
    <div class="logo_name"><img src="<?php echo URL ?>vendors/images/thekolaya-white.png" alt=""></div>
    <i class="fas fa-bars" id="btn"></i>
  </div>
  <ul class="nav-list">

    <li>
      <a href="<?php echo URL ?>Agent">
        <i class="fas fa-th-large"></i>
        <span class="links_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>
    <li>
      <a href="<?php echo URL ?>Agent/availableLandownerList">
        <i class="fa fa-list" aria-hidden="true"></i>
        <span class="links_name">Available Landowners</span>
      </a>
      <span class="tooltip">Available Landowners</span>
    </li>
    <li>
      <a href="<?php echo URL ?>Agent/confirmDeliverables">
        <i class="fa fa-check-square" aria-hidden="true"></i>
        <span class="links_name">Confirm Deliverables</span>
      </a>
      <span class="tooltip">Confirm Deliverables</span>
    </li>
    <li>
      <a href="<?php echo URL ?>Agent/viewPreviousUpdates">
        <i class="fa fa-balance-scale" aria-hidden="true"></i>
        <span class="links_name">View Previous Updates</span>
      </a>
      <span class="tooltip">View Previous Updates</span>
    </li>
    <li>
      <a href="<?php echo URL ?>Agent/viewEmergencyMessage">
        <i class="fa fa-envelope" aria-hidden="true"></i>
        <span class="links_name">Emergency Message</span>
      </a>
      <span class="tooltip">Emergency Message</span>
    </li>

  </ul>
  <div class="social_media_icon">
    <div class="social_media">
      <a href="#"><i class="fab fa-facebook-f"></i></a>
      <a href="#"><i class="fab fa-twitter"></i></a>
      <a href="#"><i class="fab fa-instagram"></i></a>
    </div>
  </div>

</div>
<section class="home-section">
  <div class="wrapper">
    <div class="navbar">
      <div class="navbar_left">
        <div class="thekolya-logo"><img src="<?php echo URL ?>vendors/images/thekolaya.png" alt=""></div>
      </div>

      <div class="navbar_right">
        <!-- Newly added -->
        <div class="icons">
          <div class="notification">
            <div class="notBtn">
              <?php
              $notificationCount = '';
              if ($_SESSION['NotSeenCount'] >= 100) {
                $notificationCount = 99;
              } else if ($_SESSION['NotSeenCount']) {
                $notificationCount = $_SESSION['NotSeenCount'];
              }
              ?>
              <!-- Using AJAX Update notification_count -->
              <div class="notiNumber" id="notification_count"><?php echo $notificationCount; ?></div>

              <i class="fas fa-bell notification_bell"></i>
              <div class="notiBox">
                <!-- <div style="padding: 15px 0 15px 30px; font-size: 1.5rem; font-weight:bold; background-color:#27ae60;">
                  Notifications
                </div> -->
                <div class="notification_header">
                  <div class="notification_top">Notifications</div>
                  <button id="notification_all_btn">All</button>
                  <button id="notification_unread_btn">Unread</button>
                </div>
                <div class="display">
                  <div class="cont" id="get_nofication">
                    <!-- Get Notification to here Using AJAX-->
                  </div>
                </div>
              </div>
            </div>
            <div class="noti-modal">
              <div class="noti-modal-content">
                <span class="noti-modal-close-button">×</span>
                <!-- <div class="title">
                  Emergency Agent Assign
               </div>  
               <label class="msg">You have been assigned to the following route due to an emergency. </label>   
                 
                 <br>
                 <label id="routeno"> Route No  : 2</label>
                                      
                <div class="inputfield" id="btnset">
                <button class="assignconfirm" id="assignconfirm" onclick="confirmassign()"> Confirm</button>
                <button class="assignreject" onclick="rejectassign()">Reject</button>               
            </div> -->
              </div>
            </div>
          </div>
        </div>
        <!-- ------------------------------ -->
        <?php include '../app/views/user/profile/navBarProfile.php'; ?>
      </div>
    </div>
  </div>

  <!-- <script>
    function rejectassign(){
      location.replace("agent/rejectAssign");  
    }

    function confirmassign(){
      location.replace("agent");
    }
    </script> -->
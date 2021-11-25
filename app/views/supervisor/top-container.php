<div class="sidebar">
  <div class="logo-details">
    <div class="logo_name"><img src="<?php echo URL ?>vendors/images/thekolaya-white.png" alt=""></div>
    <i class="fas fa-bars" id="btn"></i>
  </div>
  <ul class="nav-list">
    <li>
      <a href="<?php echo URL ?>Supervisor">
        <i class="fas fa-th-large"></i>
        <span class="links_name">Dashboard</span>
      </a>
      <span class="tooltip">Dashboard</span>
    </li>

    <li>
      <a href="<?php echo URL ?>Supervisor/updateTeaMeasure">
        <i class="fas fa-weight"></i>
        <span class="links_name">Update Net-Weight</span>
      </a>
      <span class="tooltip">Update Net-Weight</span>
    </li>
    <li>
      <a href="<?php echo URL ?>Supervisor/manageRequests">
        <i class="fab fa-acquisitions-incorporated"></i>
        <span class="links_name">Requests</span>
      </a>
      <span class="tooltip">Requests</span>
    </li>
    <li>
      <a href="<?php echo URL ?>Supervisor/manageFertilizer">
        <i class="fas fa-tree"></i>
        <span class="links_name">Fertilizer</span>
      </a>
      <span class="tooltip">Fertilizer</span>
    </li>
    <li>
      <a href="<?php echo URL ?>Supervisor/manageFirewood">
        <i class="fas fa-fire"></i>
        <span class="links_name">Firewood</span>
      </a>
      <span class="tooltip">Firewood</span>
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
              <div class="number" id="notification_count"><?php echo $notificationCount;?></div>

              <i class="fas fa-bell notification_bell"></i>
              <div class="box">
                <div class="display">
                  <div class="nothing">
                    <i class="fas fa-child stick"></i>
                    <div class="cent">Looks Like your all caught up!</div>
                  </div>
                  <div class="cont" id="get_nofication">
                    <!-- Get Notification to here Using AJAX-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ------------------------------ -->
        <?php include '../app/views/user/profile/navBarProfile.php'; ?>
      </div>
    </div>
  </div>
  <?php include 'js/notificationJs.php' ?>
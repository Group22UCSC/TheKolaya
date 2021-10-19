  <div class="sidebar">
    <div class="logo-details">
        <div class="logo_name"><img src="<?php echo URL?>vendors/images/thekolaya-white.png" alt=""></div>
        <i class="fas fa-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
     
      <li>
        <a href="<?php echo URL?>Agent">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      <!-- <li>
       <a href="<?php echo URL?>Agent/availableLandownerList">
        <i class="fa fa-list" aria-hidden="true"></i>
         <span class="links_name">Available Landowners</span>
       </a>
       <span class="tooltip">Available Landowners</span>
     </li> -->
     <li>
       <a href="<?php echo URL?>Agent/viewPreviousUpdates">
        <i class="fa fa-balance-scale" aria-hidden="true"></i>
         <span class="links_name">View Previous Updates</span>
       </a>
       <span class="tooltip">View Previous Updates</span>
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
            <div class="profile">
              <div class="icon_wrap" id="account-web">
                <img src="<?php echo URL?>vendors/images/agent/profile.jpg" alt="profile_pic">
                <span class="name"><?php echo $_SESSION['name'];?></span>
                <i class="fas fa-chevron-down"></i>
              </div>
      
              <div class="profile_dd">
                <ul class="profile_ul">
                  <li class="profile_li">
                      <div class="icon_wrap" id="account">
                        <img src="<?php echo URL?>vendors/images/agent/profile.jpg" alt="profile_pic">
                        <span class="name">Roneki</span>
                      </div>
                  </li>
                  <li><a class="profile" href="<?php echo URL?>Agent/profile"><span class="picon"><i class="fas fa-user-alt"></i></span>Profile</a></li>
                  <li><a class="settings" href="<?php echo URL?>Agent/editProfile"><span class="picon"><i class="fas fa-cog"></i></span>Settings</a></li>
                  <li><a class="logout" href="<?php echo URL?>login/logout"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
                </ul>
              </div>
            </div>
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
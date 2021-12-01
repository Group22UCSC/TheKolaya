<div class="profile">
    <div class="icon_wrap" id="account-web">
        <img src="<?php echo URL ?>vendors/images/<?php echo strtolower($_SESSION['user_type'])?>/profile.jpg" alt="profile_pic">
        <span class="name"><?php echo $_SESSION['name'] ?></span>
        <i class="fas fa-chevron-down"></i>
    </div>

    <div class="profile_dd">
        <ul class="profile_ul">
            <li class="profile_li">
                <div class="icon_wrap" id="account">
                    <img src="<?php echo URL ?>vendors/images/<?php echo strtolower($_SESSION['user_type'])?>/profile.jpg" alt="profile_pic">
                    <span class="name"><?php echo $_SESSION['name'] ?></span>
                </div>
            </li>
            <li><a class="profile" href="<?php echo URL.$_SESSION['user_type'] ?>/profile"><span class="picon"><i class="fas fa-user-alt"></i></span>Profile</a></li>
            <li><a class="settings" href="<?php echo URL.$_SESSION['user_type'] ?>/editProfile"><span class="picon"><i class="fas fa-cog"></i></span>Settings</a></li>
            <li><a class="logout" href="<?php echo URL ?>Login/logout"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
        </ul>
    </div>
</div>
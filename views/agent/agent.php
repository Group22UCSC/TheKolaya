<link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent-style.css">
<link rel="stylesheet" href="<?php echo URL?>vendors/css/agent/agent-queries.css">

<?php include 'topContainer.php';?>
    
<div class="middle-container">
        <h1>I'M THE COLLECTOR</h1>
        <hr>
        
        <div class="img-btn-container" id="middle-img-btn-container">
            <div class="img-btn-container top" id="img-btn-top">
                <div class="container top left">
                    <img src="<?php echo URL;?>vendors/images/agent/1.png" alt="">
                    <div class="btn-container top-left">
                        <button class="btn btn-available"><i class="fas fa-align-justify"></i> AVAILABLE LIST</button>
                    </div>
                </div>

                <div class="container top right" id="btn-top-right">
                    <img src="<?php echo URL;?>vendors/images/agent/2.png" alt="">
                    <div class="btn-container top-right">
                        <button class="btn btn-tea"><i class="fas fa-leaf"></i>TEA</button>
                    </div>
                </div>
            </div>

            <div class="img-btn-container bottom" id="img-btn-bottom">
                <div class="container bottom left">
                    <img src="<?php echo URL;?>vendors/images/agent/3.png" alt="">
                    <div class="btn-container bottom-left">
                        <button class="btn btn-confirm"><i class="fas fa-shopping-cart"></i>CONFIRM</button>
                    </div>
                </div>

                <div class="container bottom right" id="btn-bottom-right">
                    <img src="<?php echo URL;?>vendors/images/agent/4.png" alt="">
                    <div class="btn-container bottom-right">
                        <button class="btn btn-emergency"><i class="fas fa-concierge-bell"></i>EMERGENCY</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="mobile-img-btn-container">
            <div class="container">
                <img src="<?php echo URL;?>vendors/images/agent/1.png" alt="">
                <div class="btn-container">
                    <button class="btn btn-available"><i class="fas fa-align-justify"></i></i> AVAILABLE</button>
                </div>
            </div>

            <div class="container">
                <img src="<?php echo URL;?>vendors/images/agent/2.png" alt="">
                <div class="btn-container">
                    <button class="btn btn-tea"><i class="fas fa-leaf"></i>TEA</button>
                </div>
            </div>

            <div class="container">
                <img src="<?php echo URL;?>vendors/images/agent/3.png" alt="">
                <div class="btn-container">
                    <button class="btn btn-confirm"><i class="fas fa-shopping-cart"></i>CONFIRM</button>
                </div>
            </div>

            <div class="container">
                <img src="<?php echo URL;?>vendors/images/agent/4.png" alt="">
                <div class="btn-container">
                    <button class="btn btn-emergency"><i class="fas fa-concierge-bell"></i>EMERGENCY</button>
                </div>
            </div>
        </div>
        <hr id="hr-bottom">
    </div>
<?php include 'views/bottomContainer.php';?>
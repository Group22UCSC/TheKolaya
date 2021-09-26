<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/form-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/table-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/stock-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="title-container">
        <h2>Update Fertilizer Details</h2>
    </div>
    <div class="middle-container">
      <div class="form-instock">
        <div class="form-container">
          <div class="title">
            Firewood buy
          </div>
          <form action="#">
            <div class="form">
              <div class="inputfield">
                <label>Price per unit</label>
                <input type="number" class="input">
              </div>  
              <div class="inputfield">
                <label>Amount(kg)</label>
                <input type="number" class="input">
              </div>  
              
              <div class="inputfield">
                <input type="submit" value="Sumbit" class="accept-btn">
              </div>
              <a href="<?php echo URL?>Supervisor">
                <div class="inputfield">
                  <input type="button" value="Firewood Buy Details" class="accept-btn">
                </div>
              </a>
              
            </div>
          </form>
        </div>
      </div>
      <div class="form-outstock">
        <div class="form-container">
          <div class="title">
            Firewood use
          </div>
          <form action="#">
            <div class="form">
                <div class="inputfield">
                  <label>Amount(kg)</label>
                  <input type="number" class="input">
                </div>  
                
              <div class="inputfield">
                <input type="submit" value="Sumbit" class="accept-btn" id="out-stock-submit">
              </div>
              <a href="<?php echo URL?>Supervisor">
                <div class="inputfield">
                  <input type="button" value="Firewood Usage Details" class="accept-btn">
                </div>
              </a>
            </div>
          </form>
        </div>
      </div>
      
    </div>
    <div class="title-container btn-container-outside">
      <div class="btn-container">
        <a href="<?php echo URL?>Supervisor">
          <div class="inputfield">
            <input type="button" value="Firewood details" class="accept-btn">
          </div>
        </a>
      </div>
    </div>
<?php include 'bottom-container.php';?>




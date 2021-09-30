<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/updateTeaMeasure-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/form-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/supervisor/table-style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'top-container.php';?>
    <div class="title-container">
        <h2>update tea measure</h2>
    </div>
    <div class="middle-container">
      
      <div class="form-container-outside">
        <div class="form-container">
          <div class="title">
            Enter details
          </div>
          <form action="#">
            <div class="form">
                <div class="inputfield">
                  <label>Landowner ID</label>
                  <input type="text" class="input">
                </div>  
                <div class="inputfield">
                  <label>Initial Tea Weight</label>
                  <input type="text" class="input">
                </div>  
                <div class="inputfield">
                  <label>Reductions</label>
                  <input type="number" class="input">
                </div>  
                <div class="inputfield">
                  <label></label>
                  <input type="number" class="input">
                </div>
                <div class="inputfield">
                  <label></label>
                  <input type="number" class="input">
                </div>

              <div class="inputfield terms">
                <label id="tea-quality">Tea Quality</label>
                <label class="check">
                  
                  <input type="checkbox" name="too-bad">
                  <span class="checkmark"></span>
                </label>
                <label class="check">
                  <input type="checkbox" name="bad">
                  <span class="checkmark"></span>
                </label>
                <label class="check">
                  <input type="checkbox" name="average">
                  <span class="checkmark"></span>
                </label>
                <label class="check">
                  <input type="checkbox" name="good">
                  <span class="checkmark"></span>
                </label>
                <label class="check last-check">
                  <input type="checkbox" name="best">
                  <span class="checkmark"></span>
                </label>
              </div>
              <div class="inputfield">
                <input type="submit" value="Update" class="accept-btn">
              </div>
            </div>
          </form>
        </div>
      </div>

      <div class="table-container">
        <div class="table-row"><div class="table-name"><b>Today Tea Measure</b></div></div>
          <div class="table-row table-head">
            <div class="table-element"><b>Landowner ID</b></div>
            <div class="table-element"><b>Reductions(kg)</b></div>
            <div class="table-element"><b>Net-Weight(kg)</b></div>
            <div class="table-element"><b>Tea Quality</b></div>
          </div>

          <div class="table-row">
            <div class="table-element">Lan-001</div>
            <div class="table-element">2kg</div>
            <div class="table-element">80kg</div>
            <div class="table-element">Good</div>
          </div>
        </div>
      </div>
    </div>
<?php include 'bottom-container.php';?>

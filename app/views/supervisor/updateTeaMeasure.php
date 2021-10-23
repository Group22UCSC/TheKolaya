<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php'?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/form-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/updateTeaMeasure-style.css">
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Update Net-Weight</h2>
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

            <div class="inputfield">
              <label id="tea-quality">Tea Quality</label>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="text">5 stars</label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="text">4 stars</label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="text">3 stars</label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="text">2 stars</label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="text">1 star</label>
              </div>
            </div>
            <div class="inputfield">
              <input type="submit" value="Update" class="accept-btn">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="table-container">
      <div class="table-wrapper">
        <div class="table_header"><?php echo date("Y-M-d"); ?> - Updated Tea-Weight</div>
        <div class="table">
          <div class="row tabel-header">
            <div class="cell">Landowner ID</div>
            <div class="cell">Reductions(kg)</div>
            <div class="cell">Net-Weight(kg)</div>
            <div class="cell">Tea Quality</div>
          </div>
          <?php
          for ($i = 0; $i < 2; $i++) {
            echo '<div class="row">
                    <div class="cell" data-title="Landowener_id">LAN-00' . $i . '</div>
                    <div class="cell" data-title="Tea_weight">' . $i + 3 . '</div>
                    <div class="cell" data-title="Agent_id">5' . $i . '</div>
                    <div class="cell" data-title="Agent_id">Good</div>
                  </div>';
          }
          ?>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php include 'bottom-container.php'; ?>
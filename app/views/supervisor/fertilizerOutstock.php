<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php' ?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/outStock-style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Fertilizer Usage Details</h2>
  </div>
  <div class="middle-container">
    <div class="form-container">
      <form action="#">
        <div class="form">
          <div class="inputfield">
            <label class="search-lable">Search Useage by Date</label>
            <input type="date" class="search-label input">
            <input type="submit" value="Search" class="accept-btn">
          </div>
        </div>
      </form>
    </div>
    <?php
    for ($i = 0; $i < 1; $i++) {
      echo '<div class="row">
                  <div class="cell" data-title="Landowener_id">' . $i . '</div>
                  <hr class="horizontal-line">
                  <div class="cell" data-title="Agent_id">' . $i . '</div>
                  <hr class="horizontal-line">
                  <div class="cell" data-title="Tea_weight">' . $i . '</div>
                </div>';
    }
    ?>
  </div>
  </div> -->

  <div class="table-container">
    <div style="padding: 10px;">
      <a style="margin-bottom: 10px;" href="<?php echo URL ?>Supervisor/manageFertilizer"><button class="table-btn">Back</button></a>
    </div>
    <div class="table-wrapper">
      <div class="table">
        <div class="row tabel-header">
          <div class="cell">Date</div>
          <div class="cell">Amount(kg)</div>
          <div class="cell">Supervisor ID</div>
        </div>
        <?php
        for ($i = 0; $i < 3; $i++) {
          echo '<div class="row">
                    <div class="cell" data-title="Landowener_id">' . date("Y/m/d") . '</div>
                    <div class="cell" data-title="Amount">100' . $i . '</div>
                    <div class="cell" data-title="Supervisor_Id">SUP-00' . $i . '</div>
                  </div>';
        }
        ?>
      </div>
    </div>
  </div>
  </div>
  <?php include 'bottom-container.php'; ?>
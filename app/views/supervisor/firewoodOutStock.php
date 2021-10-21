<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php'?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/outStock-style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Firewood Usage Details</h2>
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

    <!-- <div class="table-wrapper">
      <div class="table">
        <div class="row tabel-header">
          <div class="cell">Date</div>
          <div class="cell">Price Per Unit(Rs)</div>
          <div class="cell">Amount(kg)</div>
        </div>
        <?php
        // if (count($data) > 0) {
        //   for ($i = 0; $i < count($data); $i++) {
        //     echo '<div class="row">
        //             <div class="cell" data-title="Landowener_id">' . $data[$i]['in_date'] . '</div>
        //             <div class="cell" data-title="Agent_id">' . $data[$i]['out_quantity'] . '</div>
        //             <div class="cell" data-title="Tea_weight">' . $data[$i]['emp_id'] . '</div>
        //           </div>';
        //   }
        // }
        for ($i = 0; $i < 1; $i++) {
          echo '<div class="row">
                  <div class="cell" data-title="Landowener_id">' . $i . '</div>
                  <div class="cell" data-title="Agent_id">' . $i . '</div>
                  <div class="cell" data-title="Tea_weight">' . $i . '</div>
                </div>';
        }
        ?>
      </div>
    </div> -->

    <div class="table-container">
      <div class="table-wrapper">
        <div class="table">
          <div class="row tabel-header">
            <div class="cell">Date</div>
            <div class="cell">Price Per Unit(Rs)</div>
            <div class="cell">Amount(kg)</div>
          </div>
          <?php
          // if (count($data) > 0) {
          //   for ($i = 0; $i < count($data); $i++) {
          //     echo '<div class="row">
          //           <div class="cell" data-title="Landowener_id">' . $data[$i]['in_date'] . '</div>
          //           <div class="cell" data-title="Tea_weight">' . $data[$i]['out_quantity'] . '</div>
          //           <div class="cell" data-title="Agent_id">' . $data[$i]['emp_id'] . '</div>
          //         </div>';
          //   }
          // }
          for ($i = 0; $i < 3; $i++) {
            echo '<div class="row">
                    <div class="cell" data-title="Landowener_id">' . date("Y/m/d") . '</div>
                    <div class="cell" data-title="Agent_id">5' . $i . '</div>
                    <div class="cell" data-title="Tea_weight">100' . $i . '</div>
                  </div>';
          }
          ?>
        </div>
      </div>

      <!-- <div class="table-row">
            <a href="<?php echo URL ?>Supervisor/firewoodStock"><button class="table-btn">Firewood Stock</button></a>
          </div> -->
    </div>
  </div>
  <?php include 'bottom-container.php'; ?>
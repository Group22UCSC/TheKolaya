<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php' ?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/form-style.css">
  <!-- <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/stock-style.css"> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .middle-container>div {
      background: #fff;
      box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
    }
  </style>
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Update Fertilizer Details</h2>
  </div>
  <div class="middle-container">
    <div class="form-instock" style="margin: 10px auto; padding:10px 40px">
      <div class="form-container">
        <div class="title">
          Fertilizer Purchase
        </div>
        <form action="<?php echo URL ?>Supervisor/manageFertilizer" method="POST" id="form_instock">
          <div class="form">
            <div class="inputfield">
              <label>Price per unit(Rs)</label>
              <input type="number" class="input" name="price_per_unit" id="price_per_unit">
            </div>
            <div class="inputfield">
              <label>Amount(kg)</label>
              <input type="number" class="input" name="amount" id="in_amount">
            </div>

            <div class="inputfield">
              <input type="submit" value="Submit" class="accept-btn" id="instock_submit_btn" name="Fertilizer_in">
            </div>
            <a href="<?php echo URL ?>Supervisor/FertilizerInStock" style="text-decoration: none;">
              <div class="inputfield">
                <input type="button" value="Fertilizer Purchase Details" class="accept-btn">
              </div>
            </a>
          </div>
        </form>
      </div>
    </div>
    <?php include 'script-included.php' ?>
    <?php include 'js/supervisor/manageFertilizer-js.php'; ?>
    <?php include 'bottom-container.php'; ?>
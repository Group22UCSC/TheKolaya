<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php' ?>
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
        <form action="#" id="update_tea_form" method="POST">
          <div class="form">
            <div class="inputfield">
              <label>Landowner ID</label>
              <input type="text" class="input" name="landowner_id" required>
            </div>
            <div class="inputfield">
              <label>Initial Tea Weight</label>
              <input type="number" class="input" name="weight" required>
            </div>
            <div class="inputfield">
              <label>Reductions(kg)</label>
              <input type="number" class="input" placeholder="Water" name="water">
            </div>
            <div class="inputfield">
              <label></label>
              <input type="number" class="input" placeholder="Mature Leaves" name="mature_leaves">
            </div>
            <div class="inputfield">
              <label></label>
              <input type="number" class="input" placeholder="Container" name="container">
            </div>

            <div class="inputfield">
              <label id="tea-quality">Tea Quality</label>
              <div class="rate">
                <input type="radio" id="star5" name="rate" value="5" />
                <label for="star5" title="Excellent"></label>
                <input type="radio" id="star4" name="rate" value="4" />
                <label for="star4" title="Good"></label>
                <input type="radio" id="star3" name="rate" value="3" />
                <label for="star3" title="Average"></label>
                <input type="radio" id="star2" name="rate" value="2" />
                <label for="star2" title="Bad"></label>
                <input type="radio" id="star1" name="rate" value="1" />
                <label for="star1" title="Too Bad"></label>
              </div>
            </div>
            <div class="inputfield">
              <input type="submit" value="Update" class="accept-btn" name="update" id="update_tea_btn">
            </div>
          </div>
        </form>
      </div>
    </div>

    <div class="table-container">
      <div class="table-wrapper">
        <div class="table_header">Today Updated Tea-Weight</div>
        <div class="table" id="update_tea_table">
          <div class="row tabel-header">
            <div class="cell">Landowner ID</div>
            <div class="cell">Reductions(kg)</div>
            <div class="cell">Net-Weight(kg)</div>
            <div class="cell">Tea Quality</div>
          </div>
          
          <?php
          for($i = 0; $i < 10; $i++) {
            echo '<div class="row">
                    <div class="cell" data-title="Landowener Id">1</div>
                    <div class="cell" data-title="Reductions(kg)">1</div>
                    <div class="cell" data-title="Net-Weight(kg)">1</div>
                    <div class="cell" data-title="Tea Quality">1</div>
                  </div>';
          }
          // if (!empty($data)) {

          //   for ($i = 0; $i < count($data); $i++) {
          //     if ($data[$i]['quality'] <= 20) {
          //       $teaQuality = 'Too Bad';
          //     } else if ($data[$i]['quality'] > 20 && $data[$i]['quality'] <= 40) {
          //       $teaQuality = 'Bad';
          //     } else if ($data[$i]['quality'] > 40 && $data[$i]['quality'] <= 60) {
          //       $teaQuality = 'Average';
          //     } else if ($data[$i]['quality'] > 60 && $data[$i]['quality'] <= 80) {
          //       $teaQuality = 'Good';
          //     } else if ($data[$i]['quality'] > 80 && $data[$i]['quality'] <= 100) {
          //       $teaQuality = 'Excellent';
          //     }
          //     $reductions = $data[$i]['water_precentage'] + $data[$i]['container_precentage'] + $data[$i]['matured_precentage'];
          //     if ($data[$i]['sup_id'])
          //       echo '<div class="row">
          //                 <div class="cell" data-title="Landowener Id">' . $data[$i]['lid'] . '</div>
          //                 <div class="cell" data-title="Reductions(kg)">' . $reductions . '</div>
          //                 <div class="cell" data-title="Net-Weight(kg)">' . $data[$i]['net_weight'] . '</div>
          //                 <div class="cell" data-title="Tea Quality">' . $teaQuality . '</div>
          //               </div>';
          //   }
          // }

          ?>
        </div>
      </div>
      <?php
      // if (empty($data)) {
      //   echo '<div id="not_display_yet" style="border-radius: 0px; margin-top:10px; color:red; background-color: white;" class="table_header" >There is no tea collection to update</div>';
      // }
      ?>
    </div>
  </div>
  </div>

  <?php include 'script-included.php'; ?>
  <?php include 'js/supervisor/updateTeaMeasureJs.php'; ?>
  <?php include 'bottom-container.php'; ?>
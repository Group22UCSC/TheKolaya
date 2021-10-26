<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <?php include 'styles-titleIcon-included.php' ?>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/instock-style.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php include 'top-container.php'; ?>
  <div class="title-container">
    <h2>Firewood Purchase details</h2>
  </div>
  <div class="middle-container">
    <?php
      if (!empty($data)) {
        echo '<div class="search-container">
                <div class="search-wrapper">
                  <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.." title="Type in a name">
                </div>
              </div>';
      }
    ?>
    

    <div class="tabel-container">

<?php
if (!empty($data)) {
  echo '<div class="table-wrapper">
          <div class="table" id="myTable">
            <div class="row tabel-header">
              <div class="cell">Date</div>
              <div class="cell">Price Per Unit(Rs)</div>
              <div class="cell">Amount(kg)</div>
              <div class="cell">Price For Amount(Rs)</div>
            </div>';
  for ($i = 0; $i < count($data); $i++) {
    echo '<div class="row table2-row">
            <div class="cell" data-title="Landowener_id">' . $data[$i]['in_date'] . '</div>
            <div class="cell" data-title="Tea_weight">' . $data[$i]['price_per_unit'] . '</div>
            <div class="cell" data-title="Agent_id">' . $data[$i]['in_quantity'] . '</div>
            <div class="cell" data-title="Agent_id">' . $data[$i]['price_for_amount'] . '</div>
          </div>';
  }
} else {
  echo '<p style="color:red; text-align:center; padding: 30px; font-size: 26px;"><b>Opps...! No data found</b></p>';
}
?>
        </div>
      </div>
    </div>
  </div>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/supervisor/stock-table.js"></script>
  <?php include 'bottom-container.php'; ?>
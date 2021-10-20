<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/landowner/Update_Tea_Availability.css">
<script defer src="<?php echo URL ?>vendors/js/Landowner/Update_Tea_Availability.js""></script>
<script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="top-container">
  <p>Update Tea Availability</p>
</div>
<!--  *** Update tea price box **** -->
<div class="wrapperform">
  <!-- <div class="title">
    Emergency Message
  </div> -->
  <div class="form">
    <?php
    $dateToday = date("Y-m-d");
    $year = date('Y', strtotime($dateToday));
    $month = date('F', strtotime($dateToday));
    //print_r($data);
    $y = count($data);
    $isPriceSet = 0;
    for ($j = 0; $j < $y; $j++) {
      $dbdate = $data[$j]['date'];
      $dbyear = date('Y', strtotime($dbdate));
      $dbmonth = date('F', strtotime($dbdate));
      if ($year == $dbyear and $month == $dbmonth) {
        $isPriceSet = 1;
      }
    }

    ?>

    <div class="inputfield">
      <label>Date</label>
      <input type="text" class="input" value="<?php echo date("Y-m-d") ?>" readonly>
    </div>
    <div class="inputfield">
      <label>Time</label>
      <input type="text" class="input" value="<?php echo date("h : i a") ?>" readonly>
    </div>

    <div class="inputfield">
      <label>No. of Containers Available</label>
      <input type="text" id="priceid" class="input<?php echo ($isPriceSet) ? '-set' : '' ?>" value="<?php echo ($isPriceSet) ? "Tea Price Already Set For {$month}" : ''; ?>" <?php if ($isPriceSet) {
                                                                                                                                                                                echo "readonly";
                                                                                                                                                                              } ?>>
    </div>

    <div class="inputfield">
      <label>Update Availability</label>
      <input class=" input " type="checkbox" value="Confirm Requests" data-modal-target="#modal" class="btn" name="price" <?php if ($isPriceSet) {
                                                                                                                            echo "disabled";
                                                                                                                          } ?>>
    </div>



  </div>
</div>
<!--  **** Pop up section ***  -->
<!-- <button data-modal-target="#modal">Open Modal</button> -->
<form action="<?php echo URL ?>landowner/Make_Requests" method="post">
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Confirm Request</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
      <div class="year">
        <label>Date : </label>
        <input type="text" name="date" class="model-input" value="<?php echo date("Y-m-d") ?>" readonly>
      </div>
      <div class="month">
        <label>Time : </label>
        <input type="text" name="time" class="model-input" value="<?php echo date("h : i a") ?>" readonly>
      </div>

      <div class="price">
        <label>Quantity : </label>
        <input type="text" id="priceInput" class="model-input" name="qty" readonly>
      </div>

      <div class="buttonSection">
        <a class="editbtn" data-close-button>Edit</a>
        <input type="submit" value="Submit" class="confirmbtn" name="teaPriceConfirm">
      </div>


    </div>
  </div>
  <div id="overlay"></div>
</form>

<!--  **********   view previous details   *** -->



<?php include 'bottom-container.php'; ?>
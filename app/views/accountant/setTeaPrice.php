<?php include 'top-container.php'; ?>
<body onload="getTable()"></body>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/setteaprice.css">

<div class="top-container">
    <p>Set Tea Price</p>
</div>
<!--  *** Update tea price box **** -->
<div class="wrapperdiv">


<div class="wrapperform">
    <!-- <div class="title">
           Emergency Message
        </div>         -->
    <div class="form" >
    
        <form action="<?php echo URL?>accountant/setTeaPrice" method="post" id="setTeaPriceForm">
       
        <?php
            $dateToday=date("Y-m-d");
            $year = date('Y', strtotime($dateToday));
            $month = date('F', strtotime($dateToday));
            //print_r($data);
            $y=count($data);
            $isPriceSet=0;
            for($j=0;$j<$y;$j++){
                $dbdate=$data[$j]['date'];
                $dbyear = date('Y', strtotime($dbdate));
                $dbmonth = date('F', strtotime($dbdate));
                if($year==$dbyear AND $month==$dbmonth){
                    $isPriceSet=1;
                }
            }
            
        ?>

        <div class="inputfield">
            <label>Year</label>
            <input type="text" id="year" name="year" class="input" value="<?php echo $year?>" readonly>
        </div>
        <div class="inputfield">
            <label>Month</label>
            <input type="text" class="input" id="month" name="month" value="<?php echo $month?>" readonly>
        </div>
        <div class="inputfield">
            <label>Tea Price(Rs)</label>
            <input type="text" id="price" name="teaPrice" class="input<?php echo($isPriceSet)?'-set':''?>" value="<?php echo($isPriceSet)?"Tea Price Already Set For {$month}":''; ?>" <?php if($isPriceSet){echo "readonly";} ?> >
        </div>
        <div class="inputfield">
            <input type="submit" value="Set Price" class="btn" name="submit" id="setPriceBtn" <?php if($isPriceSet){echo "disabled";} ?>>
                                 <!-- data-modal-target="#modal"  -->
        </div>
        </form>

    </div>
</div>
</div>
<!--  **** Pop up section ***  -->
<!-- <button data-modal-target="#modal">Open Modal</button> -->
<!-- <form action="<?php echo URL?>accountant/setTeaPrice" method="post">
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Confirm Tea Price</div>
      <a data-close-button class="close-button"><i class="fa fa-times-circle" aria-hidden="true"></i></a>
    </div>
    <div class="modal-body">
        <div class="year">
            <label>Year : </label>
            <input type="text" name="year" class="model-input" value="<?php echo $year?>" readonly>
        </div>
        <div class="month">
            <label>Month : </label>
            <input type="text" name="month" class="model-input" value="<?php echo $month?>" readonly>
        </div>
        <div class="price"> 
            <label>Tea Price(Rs): </label>
            <input type="text" id="priceInput" class="model-input" name="teaPrice" readonly>
        </div>
        <div class="buttonSection">
        <a class="editbtn" data-close-button>Edit</a>
        
        <input type="submit" value="Submit" class="confirmbtn" name="teaPriceConfirm">
        
        
        
        </div>
    </div>
  </div>
  <div id="overlay"></div>
</form> -->

<!--  **********   view previous details   *** -->

<div class="previousDetails">
    <button  onclick="previousPrices();scrollFunc();">Previous Tea Prices</button>
</div>

<!-- **************   Table container   *********-->
<div class="table-container" id="pricetbl">
    <div class="table-section">
        <table class="teapricetable" id="teapricetable">
            <thead class="threadcls">
                <tr class="trcls">
                    <th class="thcls">Year</th>
                    <th class="thcls">Month</th>
                    <th class="thcls">Price(Rs)</th>

                </tr>
            </thead>

        </table>
    </div>
</div>
<!-- <div id="priceForm" class="form-container">

    <div class="middleform">
        <form class="form-inline" action="#">
            <label for="year">Year:</label>
            <input type="text" id="year" placeholder="Year" name="year">
            <label for="month">Month:</label>
            <input type="text" id="month" placeholder="Month" name="month">
            <label for="price">Price:</label>
            <input type="text" id="price" placeholder="Price" name="price">

            <button type="submit">Submit</button>
        </form>
    </div>

</div> -->
<?php include 'js/accountant/setteapricejs.php"';?>
<script type="text/javascript" src="<?php echo URL?>vendors/js/sweetalert2.all.min.js"></script>
<script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>
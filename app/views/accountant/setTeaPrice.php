<?php include 'top-container.php'; ?>

<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/setteaprice.css">
<script defer src="<?php echo URL ?>vendors/js/accountant/setteaprice.js""></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
            <input type="text" class="input" value="<?php echo $year?>" readonly>
        </div>
        <div class="inputfield">
            <label>Month</label>
            <input type="text" class="input" value="<?php echo $month?>" readonly>
        </div>
        <div class="inputfield">
            <label>Tea Price(Rs)</label>
            <input type="text" id="priceid" class="input<?php echo($isPriceSet)?'-set':''?>" value="<?php echo($isPriceSet)?"Tea Price Already Set For {$month}":''; ?>" <?php if($isPriceSet){echo "readonly";} ?> >
        </div>
        <div class="inputfield">
            <input type="button" value="Set Price" data-modal-target="#modal" class="btn" name="price" <?php if($isPriceSet){echo "disabled";} ?>>
        </div>
        

    </div>
</div>
</div>
<!--  **** Pop up section ***  -->
<!-- <button data-modal-target="#modal">Open Modal</button> -->
<form action="<?php echo URL?>accountant/setTeaPrice" method="post">
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
</form>

<!--  **********   view previous details   *** -->

<div class="previousDetails">
    <button  onclick="previousPrices();scrollFunc();">Previous Tea Prices</button>
</div>
<script>
    function openModel(){

    }
    function previousPrices() {
        
        var val = document.getElementById("pricetbl").style.display;
        if (val == "none") {
            var val = document.getElementById("pricetbl").style.display = "grid";
            
        } else {
            var val = document.getElementById("pricetbl").style.display = "none";
        }
    }
    function scrollFunc(){

        window.scrollTo(0, 500);
    }
    // let scrollerID;
    //         let paused = true;
    //         let speed = 1; // 1 - Fast | 2 - Medium | 3 - Slow
    //         let interval = speed * 5;

    //         function startScroll() {
    //             let id = setInterval(function() {
    //                 window.scrollBy(0, 4);
    //                 if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    //                     // Reached end of page
    //                     stopScroll();
    //                 }
    //             }, interval);
    //             return id;
    //         }

    //         function stopScroll() {
    //             clearInterval(scrollerID);
    //         }

    //         // document.body.addEventListener('keypress', function(event) {
    //         //     if (event.which == 13 || event.keyCode == 13) {
    //                 // It's the 'Enter' key
    //                 if (paused == true) {
    //                     scrollerID = startScroll();
    //                     paused = false;
    //                 } else {
    //                     stopScroll();
    //                     paused = true;
    //                 }
                
    //         true;
</script>

<!-- **************   Table container   *********-->
<div class="table-container" id="pricetbl">
    <div class="table-section">
        <table class="teapricetable">
            <thead class="threadcls">
                <tr class="trcls">
                    <th class="thcls">Year</th>
                    <th class="thcls">Month</th>
                    <th class="thcls">Price(Rs)</th>

                </tr>
            </thead>

            <!-- <tr>
                <td class="tdcls"><a class="acls" href="#">2021</a></td>
                <td class="tdcls">January</td>
                <td class="tdcls">98</td>
                <td class="tdcls">
                    <p class="status status-paid">Updated</p>
                </td>

            </tr> -->

            <?php 
            $x=count($data);
           // print_r($data);
            // $year = date('Y', strtotime($data['date']));

            // $month = date('F', strtotime($data['date']));
            // $date = $data[0]['price'];
            // echo  $date;

            // $year = date('Y', strtotime($date));

            // $month = date('F', strtotime($date));
            // echo $year;
            // echo $month;
            
            for($i=0;$i<$x;$i++){
                $date=$data[$i]['date'];
                $year = date('Y', strtotime($date));
                $month = date('F', strtotime($date));
            echo '
            <tr>
                <td class="tdcls">'.$year.'</td>
                <td class="tdcls">'.$month.'</td>
                <td class="tdcls">'.$data[$i]['price'].'</td>
            </tr> ';
            }
            ?>
            

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
<?php include 'bottom-container.php'; ?>
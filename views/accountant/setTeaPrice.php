<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/setteaprice.css">
<script defer src="<?php echo URL ?>vendors/js/accountant/setteaprice.js""></script>
<div class="top-container">
    <p>Set Tea Price</p>
</div>
<!--  *** Update tea price box **** -->
<div class="wrapper">
    <!-- <div class="title">
           Emergency Message
        </div>         -->
    <div class="form">
        <div class="inputfield">
            <label>Year</label>
            <input type="text" class="input" value="2021" >
        </div>
        <div class="inputfield">
            <label>Month</label>
            <input type="text" class="input" value="octomber">
        </div>
        <div class="inputfield">
            <label>Tea Price(Rs)</label>
            <input type="text" class="input">
        </div>
        <div class="inputfield">
            <input type="submit" value="Set Price" data-modal-target="#modal" class="btn">
        </div>
    </div>
</div>
<!--  **** Pop up section ***  -->
<!-- <button data-modal-target="#modal">Open Modal</button> -->
  <div class="modal" id="modal">
    <div class="modal-header">
      <div class="title">Confirm Tea Price</div>
      <button data-close-button class="close-button">&times;</button>
    </div>
    <div class="modal-body">
        <div class="year">
            <label>Year : 2021</label>
        </div>
        <div class="month">
            <label>Month : September</label>
        </div>
        <div class="price">
            <label>Tea Price(Rs): 2500</label>
        </div>
        <div class="buttonSection">
        <a class="editbtn" data-close-button>Edit</a>
        
        <input type="submit" value="Confirm" class="confirmbtn" >
        
        
        
        </div>
    </div>
  </div>
  <div id="overlay"></div>

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


            <tr>
                <td class="tdcls">2021</td>
                <td class="tdcls">February</td>
                <td class="tdcls">129</td>
                

            </tr>
            <tr>
                <td class="tdcls">2021</td>
                <td class="tdcls">March</td>
                <td class="tdcls">120</td>
               

            </tr>
            <tr>
                <td class="tdcls">2021</td>
                <td class="tdcls">April</td>
                <td class="tdcls">125</td>
               

            </tr>
            <tr>
                <td class="tdcls">2021</td>
                <td class="tdcls">May</td>
                <td class="tdcls">127</td>
            
            </tr>
            <tr>
                <td class="tdcls">2021</td>
                <td class="tdcls">June</td>
                <td class="tdcls">127</td>
            
            </tr>
            <tr>
                <td class="tdcls">2021</td>
                <td class="tdcls">July</td>
                <td class="tdcls">127</td>
            
            </tr>
            <tr>
                <td class="tdcls">2021</td>
                <td class="tdcls">August</td>
                <td class="tdcls">127</td>
            
            </tr>
            

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
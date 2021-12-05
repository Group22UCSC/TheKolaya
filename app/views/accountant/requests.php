<?php include 'top-container.php'; ?>
<!-- Top container -->
<body onload="getAdvanceRequests();">
    
</body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/requests.css">

<div class="middle-section">
    <div class="top-container">
        <div class="left"></div>
        <div class="middle">
            Advance Requests
        </div>
        <div class="right"></div>
    </div>
</div>
<!--  ******* search bar ********* -->
<div class="searchbar">
    <form class="search-form" action="#">
        <label for="lname">Landowner's name:</label>
        <input type="text" id="lname" placeholder="Landowner's Name" name="lname">
        <button type="submit">Search</button>
    </form>
</div>
<!-- Table container -->
<div class="table-container" id="idtable-container">
    <div class="table-section">
        <table class="requeststbl" id="requeststbl">
            
                <tr class="trcls">
                    <th class="thcls">Rid</th>
                    <th class="thcls">Lid</th>
                    <th class="thcls">Name</th>
                    <th class="thcls">Request Date(Rs)</th>
                    <th class="thcls">Amount</th>
                   

                </tr>
            


                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">L.Gunapala</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                   

                </tr>
                

        </table>
    </div>

    

    <div class="form-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
            <h1>Advance Request</h1>

            <label for="rid"><b>Rid</b></label>
            <input type="text" placeholder="Enter Rid" name="rid" id="rid" required readonly> 
            <label for="lid"><b>Lid</b></label>
            <input type="text" placeholder="Enter Lid" name="lid" id="lid" required readonly>

            <label for="name"><b>Name</b></label>
            <input type="text" placeholder="Enter Name" name="name" id="name" required readonly>

            <label for="date"><b>Date</b></label>
            <input type="text" placeholder="Enter Date" name="date" id="date" required readonly>

            <label for="amount"><b>Amount(Rs)</b></label>
            <input id="amount" type="text" placeholder="Enter the amount" name="amount" required readonly>

            <label for="Comment"><b>Comment</b></label>
            <!-- <textarea id="Comment" type="text" placeholder="Comment" name="comment" </textarea> -->
            <textarea name="" id="Comment" cols="30" rows="10" placeholder="Please Enter Your Comment Here" name="coment"></textarea>
            <a class="btn viewlandowner" href="<?php echo URL?>/accountant/landownersGraphpage">View Landowner</a>
            <a class="btn accept">Accept</a>
            <a class="btn cancel">Reject</a>
            
        </form>
    </div>

    <!-- <script>
        function openForm() {
            
            document.getElementById("myForm").style.display = "inline";
           
            // document.getElementById("requeststbl").style.width = "50%";
            // window.scrollTo(0, 600);
    
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script> -->


</div>
<?php include 'js/accountant/requestsjs.php"';?>
<script type="text/javascript" src="<?php echo URL?>vendors/js/sweetalert2.all.min.js"></script>
<script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>
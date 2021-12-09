<?php include 'top-container.php'; ?>
<!-- Top container -->

<body onload="getLandonwerTable();"> </body>
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/landowners.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
<div class="top-container">
           <p>Landowner's Details</p> 
</div>
<!-- ***************** search bar **************** -->
<div id="landownerdetails" class="form-container">


    <form class="search-form" action="#">
        <label for="lid">Landowner's ID:</label>
        <input type="text" id="lid" placeholder="Lid" name="lid">
        <button type="submit">Search</button>
        <label for="lname">Landowner's name:</label>
        <input type="text" id="lname" placeholder="Landowner's Name" name="lname">
        <button type="submit">Search</button>
    </form>
</div>
<!-- ********************** Table container  ***********************-->
<div class="table-container">
    <div class="table-section">
        <table class="teapricetable" id="teapricetable">
            
                <tr class="trcls">
                    <th class="thcls">Lid</th>
                    <th class="thcls">Name</th>
                    <th class="thcls">Contact No</th>
                    <th class="thcls">Address</th>
                    <th class="thcls">Action</th>
                 </tr>
           



            <!-- <tr>
                <td class="tdcls">L456</td>
                <td class="tdcls">Kamal Jayawardane</td>
                <td class="tdcls">
                    <button id="tblbtn" class="tblbutton" onclick="location.href='<?php echo URL?>/accountant/landownersGraphpage';">View Deatils</button>
                </td>

            </tr> -->
            
            
        </table>
    </div>

    
</div>

<?php include 'js/accountant/landownersDetailsjs.php';?>
<script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>
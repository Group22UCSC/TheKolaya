<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/requests.css">
<script defer src="<?php echo URL ?>vendors/js/accountant/requests.js""></script>
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
            <!-- <thead class="threadcls"> -->
                <tr class="trcls">
                    <th class="thcls">Rid</th>
                    <th class="thcls">Lid</th>
                    <th class="thcls">Request Date(Rs)</th>
                    <th class="thcls">Amount</th>
                    <th class="thcls">Action</th>

                </tr>
            <!-- </thead> -->

            <!-- <tr>
                <td class="tdcls"><a class="acls" href="#">2021</a></td>
                <td class="tdcls">January</td>
                <td class="tdcls">98</td>
                <td class="tdcls">
                    <p class="status status-paid">Updated</p>
                </td>

            </tr> -->

            <!-- <tbody> -->


                <tr onclick="openForm()">
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                        <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>

                </tr>
                <tr>
                    <td class="tdcls">AR445</td>
                    <td class="tdcls">L45</td>
                    <td class="tdcls">09/06/2021</td>
                    <td class="tdcls">1200</td>
                    <td class="tdcls">
                        <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>

                </tr>
                <tr>
                    <td class="tdcls">AR32</td>
                    <td class="tdcls">L43</td>
                    <td class="tdcls">09/08/2021</td>
                    <td class="tdcls">12800</td>
                    <td class="tdcls">
                        <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>
                <tr>
                    <td class="tdcls">AR52</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">06/09/2021</td>
                    <td class="tdcls">22500</td>
                    <td class="tdcls">
                        <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>
                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                    <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>

                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                    <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>
                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                    <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>
                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                    <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>
                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                    <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>
                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                    <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>
                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                    <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>

                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                    <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>

                <tr>
                    <td class="tdcls">AR352</td>
                    <td class="tdcls">L453</td>
                    <td class="tdcls">09/09/2021</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">
                    <a class="select" href="#" onclick="openForm()">Select</a>
                    </td>
                </tr>
               
            <!-- </tbody> -->

        </table>
    </div>

    

    <div class="form-popup" id="myForm">
        <form action="/action_page.php" class="form-container">
            <h1>Advance Request</h1>

            <label for="rid"><b>Rid</b></label>
            <input type="text" placeholder="Enter Rid" name="rid" id="rid" required readonly> 
            <label for="lid"><b>Lid</b></label>
            <input type="text" placeholder="Enter Lid" name="lid" id="lid" required readonly>

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

<?php include 'bottom-container.php'; ?>
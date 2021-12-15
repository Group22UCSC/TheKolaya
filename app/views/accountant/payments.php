<?php include 'top-container.php'; ?>
<!-- Top container -->
<link rel="stylesheet" href="<?php echo URL ?>vendors/css/accountant/payments.css">
<div class="top-container">
    <p>Monthly Payment</p>
</div>
<!--  ******* search bar ********* -->
<!-- <div class="searchbar">
    <form class="search-form" action="#">
        
        <label for="lname" style="font-weight: 600;">Enter Lid:</label>
        <input type="text" id="lname" placeholder="Landowner Id" name="lname">
        <button type="submit">Search</button>
    </form>
</div> -->
<?php 
    $year=date('Y');
    $month=date('m');
    $string=$year."/".$month."/1";
    //echo $string;
    $time=strtotime($string);
    $dateStart=date('Y-m-d',$time);
    echo $dateStart;


    // $dateToTest = "2016-02-01";
    // $lastday = date('t',strtotime($dateToTest));
    // echo "last day :".$lastday;
?>
<!-- hidden feild in order to calculate the payment -->
<input for="lastPaidDate" type="text" name="lastPaidDate" id="lastPaidDate" readonly />
<div class="formSection">
<form action="<?php echo URL ?>/accountant/pdf" method="POST" target="_blank">
		<!-- <h2>CSS Form</h2> -->
		<div class="large-group">
			<div class="small-group">
				<label for="lid">Lid</label>
				<input id="lid" type="text" name="lid" placeholder="Enter Lid" autofocus />
			</div>
			
			<div class="small-group">
				<label for="name">Landowner's Name</label>
				<input for="name" type="text" name="name" id="lname" readonly />
			</div>
			
			<div class="small-group">
                <label for="year">Year</label>
				<input for="year" type="text" name="year" id="year" value="<?php echo $year?>"/>
			</div>
			<div class="small-group">
				<label for="month">Month</label>
				<input for="month" type="text" name="month" id="month" value="<?php echo $month?>" />
			</div>
			
			<div class="small-group">
				<label for="grossIncome">Gross Income(Rs)</label>
				<input id="grossIncome" type="number" name="grossIncome" readonly/>
			</div>
			
			<div class="small-group">
				<label for="fertilizer">Fertilizer Expenses(Rs)</label>
				<input id="fertilizer" type="text" name="fertilizer" readonly/>
			</div>
            
            <div class="small-group">
				<label for="advance">Advance Expenses(Rs)</label>
				<input id="advance" type="text" name="advance" readonly/>
            </div>
            <div class="small-group finalPayment">
				<label for="final" style="color:red">Final Payment(Rs)</label>
				<input id="final" type="text" name="final" readonly/>
            </div>
            <!-- for text area  -->
			<!-- <div class="textarea-div">
				<label for="advance">Advance Expenses</label>
				<input id="advance" type="text" name="advance"/>
			</div> -->
			
                <input id="submitbtn" class="btn" type="submit" name="submit"/>
                

		</div>
	</form>
</div>
<!-- Table container -->
<div class="table-container">
    <div class="table-section">
        <table class="teapricetable">
            <thead class="threadcls">
                <tr class="trcls">
                    <th class="thcls">Year</th>
                    <th class="thcls">Month</th>
                    <th class="thcls">Lid(Rs)</th>
                    <th class="thcls">Income</th>
                    <th class="thcls">Fertilizer Expences</th>
                    <th class="thcls">Advance Expences</th>
                    <th class="thcls">Final Payment</th>
                    <!-- <th class="thcls">Status</th> -->

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

            <tbody>


                <tr>
                    <td class="tdcls">2021</td>
                    <td class="tdcls">February</td>
                    <td class="tdcls">129</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    <!-- <td class="tdcls">
                        <a class="status status-paid" href="#" onclick="openForm()">Select</a>
                    </td> -->

                </tr>
                <tr>
                    <!-- <td class="tdcls"><a class="acls" href="#">2021</a></td> -->
                    <td class="tdcls">2021</td>
                    <td class="tdcls">March</td>
                    <td class="tdcls">120</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    <!-- <td class="tdcls">
                        <p class="status status-paid">Paid</p>
                    </td> -->

                </tr>
                <tr>
                    <!-- <td class="tdcls"><a class="acls" href="#">2021</a></td> -->
                    <td class="tdcls">2021</td>
                    <td class="tdcls">March</td>
                    <td class="tdcls">120</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    <!-- <td class="tdcls">
                        <p class="status status-paid">Paid</p>
                    </td> -->

                </tr>
                <tr>
                    <!-- <td class="tdcls"><a class="acls" href="#">2021</a></td> -->
                    <td class="tdcls">2021</td>
                    <td class="tdcls">February</td>
                    <td class="tdcls">129</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    <!-- <td class="tdcls">
                        <p id="pendingbtn" class="status status-pending">Pending</p>
                    </td> -->

                </tr>
                <tr>
                    <!-- <td class="tdcls"><a class="acls" href="#">2021</a></td> -->
                     <td class="tdcls">2021</td>
                    <td class="tdcls">February</td>
                    <td class="tdcls">129</td>
                    <td class="tdcls">12500</td>
                    <td class="tdcls">0</td>
                    <td class="tdcls">1500</td>
                    <td class="tdcls">11000</td>
                    

                </tr>
            </tbody>

        </table>
    </div>
</div>

<?php include 'js/accountant/paymentsjs.php';?>
<script type="text/javascript" src="<?php echo URL?>vendors/js/sweetalert2.all.min.js"></script>
<script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>
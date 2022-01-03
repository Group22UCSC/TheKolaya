<?php include 'top-container.php'; ?>
<!-- Top container -->
<body onload="getPayment()"></body>
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
    //echo $dateStart;


    // $dateToTest = "2016-02-01";
    // $lastday = date('t',strtotime($dateToTest));
    // echo "last day :".$lastday;
?>
<!-- hidden feild in order to calculate the payment -->

<div class="formSection">
<form action="<?php echo URL?>accountant/pdf" method="post" target="_blank" id="paymentForm">
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
				<input for="year" type="text" name="year" id="year" value="<?php echo $year?>"  onfocus=""/>
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
            <div class="small-group">
				<label for="advance">Tea Price Of The Month(Rs)</label>
				<input id="teaPrice" type="text" name="teaPrice" readonly/>
            </div>
            <div class="small-group">
				<label for="advance">Cheque Ref No(Rs)</label>
				<input id="chequeRef" type="text" name="chequeRef" placeholder="Please Enter The Ref No Of The Cheque" />
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
			
                
                <input type="submit"  class="btn" name="submit" id="paymentSubmitbtn">

		</div>
	</form>
</div>
<!-- Table container -->
<div class="table-container">
    <div class="table-section">
        <table class="teapricetable" id="paymentTable">
            <thead class="threadcls">
                <tr class="trcls">
                    <th class="thcls">Inv</th>
                    <th class="thcls">Date</th>
                    <th class="thcls">Lid(Rs)</th>
                    <th class="thcls">Year</th>
                    <th class="thcls">Month</th>
                    <th class="thcls">Gross Income</th>
                    <th class="thcls">Fertilizer Expences</th>
                    <th class="thcls">Advance Expences</th>
                    <th class="thcls">Final Payment</th>
                    <th class="thcls">Cheque Ref No</th>
                    <th class="thcls">Action</th>
                    <!-- <th class="thcls">Status</th> -->

                </tr>
            </thead>
            <tbody>

            </tbody>

        </table>
    </div>
</div>

<?php include 'js/accountant/paymentsjs.php';?>
<script type="text/javascript" src="<?php echo URL?>vendors/js/sweetalert2.all.min.js"></script>
<script src="<?php echo URL?>vendors/js/jquery-3.6.0.min.js"></script>
<?php include 'bottom-container.php'; ?>
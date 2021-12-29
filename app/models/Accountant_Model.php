<?php

class Accountant_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }
    
    function editProfile() {
        $contact_number = $_SESSION['contact_number'];
        $name = $_SESSION['name'];
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE user SET contact_number='$contact_number', name='$name' WHERE user_id='$user_id'";
        $this->db->runQuery($query);
    }

    function checkPassword($data) {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM user WHERE user_id='$user_id'";
        
        $row = $this->db->runQuery($query);
        $hashed_password = $row[0]['password'];

        if(password_verify($data['password'], $hashed_password)) {
            return $row;
        }else {
            return false;
        }
    }

    function changePassword($data = []) {
        $new_password = $data['new_password'];
        $contact_number = $_SESSION['contact_number'];
        
        $query = "UPDATE user SET password='$new_password' WHERE contact_number='$contact_number'";
        $row = $this->db->runQuery($query);
        if($row) {
            return true;
        }else {
            return false;
        }
    }

    //Test
    function testModel(){
       $query="SELECT * FROM product";
       return $this->db->runQuery($query);
    }
    //auctionDetails
    function auction(){
        

        $query = "SELECT auction.date,product.product_id, product.product_name, auction.sold_amount, auction.sold_price,buyer.name,buyer.buyer_id
                FROM auction 
                INNER JOIN product 
                ON auction.product_id=product.product_id 
                INNER JOIN buyer 
                ON auction.buyer_id=buyer.buyer_id ORDER BY auction.date ASC";
        $row = $this->db->selectQuery($query);
        //echo gettype($row);
        //$var1 = json_encode($row, JSON_FORCE_OBJECT);
        if($row){
            return $row;
        }else {
            return false;
        }
    }

    
    function getEmpId(){
        //$query="SELECT * FROM "
    }
    function teaPriceTable(){
        $query = "SELECT * FROM monthly_tea_price";
        $row = $this->db->selectQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }
    function insertTeaPrice(){
            $date=date("Y-m-d");
            $month=$_POST['month'];
            $year=$_POST['year'];
            $teaPrice=$_POST['teaPrice'];
            // HAS TO CHANGE THIS
            $emp_id=$_SESSION['user_id'];
            $query = "INSERT INTO monthly_tea_price (date,year,month,price,emp_id) VALUES ('{$date}','{$year}','{$month}','{$teaPrice}','{$emp_id}')";
            $row = $this->db->insertQuery($query);
            //print_r($row);
            if($row){
                return true;
            }else {
                return false;
            }
    }

    function deleteSetTeaPriceRow(){
        $date=$_POST['date'];
        $query = " DELETE FROM `monthly_tea_price` WHERE date='{$date}'";
        $row = $this->db->insertQuery($query);
        $result=$this->db->deleteQuery($query);
        echo $result;
    }
    function getLandonwerTable(){
        $query="SELECT landowner.user_id,landowner.contact_number,user.name,user.address
        FROM landowner INNER JOIN user ON landowner.user_id=user.user_id";

        $row = $this->db->selectQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }


    //get the auction income of the last 30 days
    function AuctionIncome30(){
        // $from=date('Y-m-d',strtotime($_POST['from']));GGG
		// 		$to=date('Y-m-d',strtotime($_POST['to']));
        $dateTomorow=date('Y-m-d',strtotime("+1 day")); // todays date
        $dateBack30 = date('Y-m-d',strtotime('-30 days')); // 30 days ago
        $query="SELECT `date`, `sold_amount`,`sold_price` FROM `auction` WHERE date>= '$dateBack30' AND date <'$dateTomorow'";
        //details are not coming for 30 days
        $row = $this->db->selectQuery($query);
        
        if($row){
            return $row;
        }else {
            return false;
        }
    }
    
    //get the in-stock(fertilizer,firewood) expenses of the last 30 days
    function instockExp30(){
        // $from=date('Y-m-d',strtotime($_POST['from']));GGG
		// 		$to=date('Y-m-d',strtotime($_POST['to']));
        $dateTomorow=date('Y-m-d',strtotime("+1 day")); // todays date
        $dateBack30 = date('Y-m-d',strtotime('-30 days')); // 30 days ago
        $query="SELECT `price_for_amount` FROM `in_stock` WHERE in_date>= '$dateBack30' AND in_date <'$dateTomorow'";
        //details are not coming for 30 days
        $row = $this->db->selectQuery($query);
        
        if($row){
            return $row;
        }else {
            return false;
        }
    }

    //get the payment expenses of the last 30 days
    function  paymentExp30(){
        // $from=date('Y-m-d',strtotime($_POST['from']));GGG
		// 		$to=date('Y-m-d',strtotime($_POST['to']));
        $dateTomorow=date('Y-m-d',strtotime("+1 day")); // todays date
        $dateBack30 = date('Y-m-d',strtotime('-30 days')); // 30 days ago
        $query="SELECT `final_payment` FROM `monthly_payment` WHERE Date>= '$dateBack30' AND Date <'$dateTomorow'";
        //details are not coming for 30 days
        $row = $this->db->selectQuery($query);
        
        if($row){
            return $row;
        }else {
            return false;
        }
    }
   

    function getAdvanceRequests(){
        $sql="SELECT request.request_id,request.request_date,request.lid,advance_request.amount_rs,user.name
        FROM request 
        INNER JOIN advance_request ON request.request_id=advance_request.request_id 
        INNER JOIN user ON user.user_id=request.lid
        WHERE request.request_type='advance' AND request.response_status='receive' ";
        $row=$this->db->selectQuery($sql);
        if($row){
            return $row;
        }
        else{
            return false;
        }
    }
    function acceptAdvanceRequest(){ // when the requested is accepted 
        $user_id = $_SESSION['user_id'];
        $comment=$_POST['comment'];
        $rid=$_POST['rid'];
        $name=$_POST['name'];
        $amount=$_POST['amount'];
        $today=date('Y-m-d');
        // $query="SELECT * FROM request"
        $query1="UPDATE advance_request SET acc_id='{$user_id}' WHERE request_id='{$rid}'";
        $query2="UPDATE request SET confirm_date='{$today}',response_status='accept',comments='{$comment}' WHERE request_id='$rid'";
        if($comment==''){
            $message = "Dear customer your advance request of Rs." . $amount." is accepted and will handover to you as quickly as possible. Thank you for being with තේ කොළය";
        }
        else{
            $message = "Dear customer your advance request of Rs." . $amount." is accepted and will handover to you as quickly as possible. Thank you for being with තේ කොළය (Comment : ". $comment.")";
        }
        $notificationQuery = "INSERT INTO notification(read_unread, seen_not_seen, message, receiver_type, notification_type, sender_id) 
            VALUES(0, 0, '$message', 'Landowner', 'request', '" . $_SESSION['user_id'] . "')";
        
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{ 
            $this->db->beginTransaction();
            $row = $this->db->insertQuery($query1);
            $row2 = $this->db->insertQuery($query2);
            $row3=$this->db->runQuery($notificationQuery);
            //print_r($row);
            $this->db->commit();
            if($row2){
                return true;
            }else {
                return false;
            }
        }
        catch( PDOException $e){
            $this->db->rollback();
            throw $e;
        }
    }

    //rejected advance requests
    function rejecttAdvanceRequest(){
        $user_id = $_SESSION['user_id'];
        $comment=$_POST['comment'];
        $rid=$_POST['rid'];
        $name=$_POST['name'];
        $amount=$_POST['amount'];
        $today=date('Y-m-d');
        // $query="SELECT * FROM request"
        $query1="UPDATE advance_request SET acc_id='{$user_id}' WHERE request_id='{$rid}'";
        $query2="UPDATE request SET confirm_date='{$today}',response_status='decline',comments='{$comment}' WHERE request_id='$rid'";
        if($comment==''){
            $message = "Dear customer, we regret to inform that your advance request of Rs." . $amount." is rejected due to an unavoidable reason. Contact us for more details. Thank you for being with තේ කොළය";
        }
        else{
            $message = "Dear customer, we regret to inform that your advance request of Rs." . $amount." is rejected due to an unavoidable reason. Contact us for more details. Thank you for being with තේ කොළය ( Comment :". $comment." )";
        }
        $notificationQuery = "INSERT INTO notification(read_unread, seen_not_seen, message, receiver_type, notification_type, sender_id) 
            VALUES(0, 0, '$message', 'Landowner', 'request', '" . $_SESSION['user_id'] . "')";
        
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try{ 
            $this->db->beginTransaction();
            $row = $this->db->insertQuery($query1); // updating the request table
            $row2 = $this->db->insertQuery($query2); // updating the request table
            $row3=$this->db->runQuery($notificationQuery);
            //print_r($row);
            $this->db->commit();
            if($row2){
                return true;
            }else {
                return false;
            }
        }
        catch( PDOException $e){
            $this->db->rollback();
            throw $e;
        }
    }

     //Get Notification
     function getNotification($data = [])
     {
         $notification_type = $data['notification_type'];
         if (isset($data['notification_id'])) {
             $notification_id = $data['notification_id'];
             $query = "UPDATE notification 
             SET read_unread=1 WHERE notification_id='$notification_id'";
             $this->db->runQuery($query);
         }
         if ($notification_type == 'full') {
             $query = "SELECT * FROM notification 
             WHERE receiver_type='Accountant' ORDER BY read_unread ASC, notification_id DESC";
         } else if ($notification_type == 'half') {
             $query = "SELECT * FROM notification 
             WHERE receiver_type='Accountant' AND read_unread=0 ORDER BY notification_id DESC";
         }
 
         $row = $this->db->runQuery($query);
 
         if(isset($data['notification_id'])) {
             if (count($row)) {
             return $row;
         } else {
             return false;
         }
         }
 
         $query = "UPDATE notification
                 SET seen_not_seen=1 WHERE seen_not_seen=0";
         $this->db->runQuery($query);
         $_SESSION['NotSeenCount'] = '';
         echo '<p>' . $_SESSION["NotSeenCount"] . '</p>';
         if (count($row)) {
             return $row;
         } else {
             return false;
         }
     }
 
     function updateReadNotification($notification_id)
    {
        $query = "UPDATE notification 
        SET read_unread=1 WHERE notification_id='$notification_id'";
        $this->db->runQuery($query);

        $query = "SELECT * FROM notification 
            WHERE receiver_type='Accountant' ORDER BY notification_id DESC";

        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        }
    }
    function getNotificationCount()
    {
        $query = "SELECT * FROM notification 
        WHERE receiver_type='Accountant' AND seen_not_seen=0";
        $row = $this->db->runQuery($query);

        if (count($row)) {
            $_SESSION['NotSeenCount'] = count($row);
            if (isset($_GET['getCount']))
                echo $_SESSION['NotSeenCount'];
        } else {
            $_SESSION['NotSeenCount'] = 0;
        }
    }

    function getLandownerNamePayment(){ //get the name of the landowner for the payment form
        $user_id=$_POST['lid'];
        $sql="SELECT name FROM user WHERE user_id='{$user_id}'";
        $row=$this->db->selectQuery($sql);
        if($row){
            return $row;
        }
        else{
            return false;
        } 
    }

    //get the details of the tea handed over to the factory by lid in that month
    function getteaCollection(){
        $user_id=$_POST['lid'];
         $year=$_POST['year'];
         $month=$_POST['month'];
        // //return $month;
        $date= strtotime($year."-".$month."-01" );
        $first = date('Y-m-01',$date); // hard-coded '01' for first day
        $last  = date('Y-m-t',$date);
       // $query_date = '2021-12-04';
        // First day of the month.
// $first_day_this_month=date('Y-m-01', strtotime($query_date));

        // $lastPaymentD=$lastPaymentDate[0]['toDate'];//from lastPaymentDate it return an array
                           // so get the relevant data from it.
        //$nextDate=strtotime('+1 day',strtotime($lastPaymentD)); // get the next date
        // $year=$_POST['year'];
        // $month=$_POST['month'];
        // $stringFrom = $year . "/" . $month . "/1";
        // $stringTo =  $year . "/" . $month . "/1";
        // $time = strtotime($stringFrom);
        // $dateStart = date('Y-m-d', $time);
        // $lastPaidDate=$_POST['lastPaidDate'];
        //$today=date('Y-m-d');
        //return $lastPaymentD;
        $sql="SELECT net_weight FROM tea WHERE lid='{$user_id}' AND date <='{$last}' AND date >= '{$first}' ";
        $row=$this->db->selectQuery($sql);
        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    function getLastPaymentDate(){// last date where the payment was made for that particular landowner
        $user_id=$_POST['lid'];
        $sql="SELECT toDate FROM monthly_payment WHERE lid='{$user_id}' ORDER BY toDate DESC LIMIT 1";
        $row=$this->db->selectQuery($sql);
        if($row){
            return $row;
        }
        else{
            return false;
        }
    }


    function getmonthlyTPrice(){
        // $lastPaymentD = $lastPaymentDate[0]['toDate']; //from lastPaymentDate it return an array
        // $dateValue = strtotime($lastPaymentD);
        $year=$_POST['year'];
        $month=$_POST['month'];
        // $month = date('m', $dateValue);
        // $year = date('Y', $dateValue);

        $sql = "SELECT price FROM monthly_tea_price WHERE month='{$month}' AND year='{$year}' ";
        //$sql = "SELECT price FROM monthly_tea_price WHERE date='{$lastPaymentD}' ";
        $row = $this->db->selectQuery($sql);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function checkPayment(){//check whether the landowner is already paid for that month
        $user_id=$_POST['lid'];
        $year=$_POST['year'];
        $month=$_POST['month'];
        $sql="SELECT lid FROM monthly_payment WHERE lid='{$user_id}' AND month='{$month}' AND year='{$year}' ";
        $row=$this->db->selectQuery($sql);
        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    //get fertilizer details
    function getFertilizer(){
        $user_id=$_POST['lid'];
        $year=$_POST['year'];
        $month=$_POST['month'];
        // //return $month;
        $date= strtotime($year."-".$month."-01" );
        $first = date('Y-m-01',$date); // hard-coded '01' for first day
        $last  = date('Y-m-t',$date);
        $sql="SELECT fertilizer_request.amount FROM fertilizer_request
            INNER JOIN request ON request.request_id=fertilizer_request.request_id
         WHERE request.lid='{$user_id}' AND (request.confirm_date BETWEEN '{$first}' AND '{$last}') AND request.complete_status=1 AND request.request_type='fertilizer' ";
        $row=$this->db->selectQuery($sql);
        $arr=array();
        $arr[0]["amount"]=0; //default amount of fertilizer = 0
        if($row){
            // return $row;
            //$arr = array('amount' => 0);
            
            if(!empty($row)) { //if rows are not empty thre are fertilizer requests
                return  $row;// Rows Returned
              }else{
                 echo $arr;
              }
            
        }
        else{
            return $arr; //if no fertilizer requests. amount = 0
        }
    }

    // get the price of the fertilizer
    function getFertilizerPrice(){
        $sql="SELECT price_per_unit FROM in_stock ORDER BY in_date DESC LIMIT 1";
        $row=$this->db->selectQuery($sql);
        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    function getAdvance(){
        $user_id=$_POST['lid'];
        $year=$_POST['year'];
        $month=$_POST['month'];
        // //return $month;
        $date= strtotime($year."-".$month."-01" );
        $first = date('Y-m-01',$date); // hard-coded '01' for first day
        $last  = date('Y-m-t',$date);
        $sql="SELECT advance_request.amount_rs FROM advance_request
            INNER JOIN request ON request.request_id=advance_request.request_id
         WHERE request.lid='{$user_id}' AND (request.confirm_date BETWEEN '{$first}' AND '{$last}') AND request.complete_status=1 AND request.request_type='advance' ";
        $row=$this->db->selectQuery($sql);
        $arr=array();
        $arr[0]["amount"]=0; //default amount of fertilizer = 0
        if($row){
            // return $row;
            //$arr = array('amount' => 0);
            
            if(!empty($row)) { //if rows are not empty thre are fertilizer requests
                return  $row;// Rows Returned
              }else{
                 echo $arr;
              }
            
        }
        else{
            return $arr; //if no fertilizer requests. amount = 0
        }
    }

    //set the payment details to the database
    function setPayment(){
        $date = date("Y-m-d");
        $month = $_POST['month'];
        $year = $_POST['year'];
        $lid = $_POST['lid'];
        $gIncome = $_POST['gIncome'];
        $fertilizer = $_POST['fertilizer'];
        $advance = $_POST['advance'];
        $cheque = $_POST['cheque'];
        $final = $_POST['final'];
        $emp_id = $_SESSION['user_id'];

        $query = "INSERT INTO monthly_payment VALUES ('{$date}','{$lid}','{$year}','{$month}','{$fertilizer}','{$advance}','{$gIncome}','{$final}','{$cheque}','{$emp_id}')";
        $row = $this->db->insertQuery($query);
        //print_r($row);
        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    //getting payment details
    function getPayment(){
        $sql="SELECT * FROM monthly_payment ORDER BY Date DESC";
        $row=$this->db->selectQuery($sql);
        if($row){
            return $row;
        }
        else{
            return false;
        }
    }
    function genPDF(){
        $lid=$_POST['lid'];
        $year=$_POST['Year'];
        $month=$_POST['Month'];
        // return $lid;
        $sql="SELECT * FROM monthly_payment WHERE  lid='{$lid}' AND year='{$year}' AND month='{$month}' ";
        // $sql="SELECT * FROM monthly_payment WHERE lid='{$lid}' ORDER BY Date DESC ";
        $row=$this->db->runQuery($sql);
        // return $row[0]['lid'] ?? 'default value';
        if($row){
            return $row;
        }
        else{
            return false;
        }
    }

    function deletePayment(){
        $date=$_POST['date'];
        $lid=$_POST['lid'];
        $year=$_POST['year'];
        $month=$_POST['month'];
        $query = " DELETE FROM `monthly_payment` WHERE lid='{$lid}' AND year='{$year}' AND month='{$month}' ";
        $result=$this->db->deleteQuery($query);
        echo $result;
    }

}
?>
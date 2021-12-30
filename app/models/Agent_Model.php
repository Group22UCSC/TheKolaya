<?php

class Agent_Model extends Model{

    function __construct()
    {
        parent::__construct();
    }
    
    //edit profile
    function editProfile() {
        $contact_number = $_SESSION['contact_number'];
        $name = $_SESSION['name'];
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE user SET contact_number='$contact_number', name='$name' WHERE user_id='$user_id'";
        $this->db->runQuery($query);
    }

    //check password
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

    //change password
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

    //check whether the agent is available
    function checkAvailability(){
        $agent_id = $_SESSION['user_id'];
        $query = "SELECT availability FROM agent WHERE emp_id='$agent_id'";
        $row = $this->db->runQuery($query);

        if($row) {
            return $row;
        }else {
            return 0;
        }
    }

    //make the unavailable agent available
    function availableAgent(){
        $agent_id = $_SESSION['user_id'];
        $query = $next_query = "UPDATE agent SET availability='1' WHERE emp_id='$agent_id'";
         $this->db->runQuery($query);

    }

    //get details to display tea available list
    function availableListTable(){
        $route_no=$_SESSION['route']; 
        $agent_id = $_SESSION['user_id'];

        $pre_query="SELECT  assigned_routes FROM agent WHERE emp_id='$agent_id'";
        $isassigned = $this->db->runQuery($pre_query);
        // print_r($isassigned);
        $assigned = $isassigned[0]['assigned_routes'];
        // print_r("assigned".$assigned);

        // if($isassigned[0]['assigned_routes'] == ''){
        //     $query = "SELECT user_id, no_of_estimated_containers FROM landowner WHERE route_no='$route_no' AND landowner_type='indirect_landowner' AND tea_availability=1 ";            
        // }
        // else{            
        $query = "SELECT user_id, no_of_estimated_containers FROM landowner WHERE (route_no='$route_no' OR route_no = '$assigned') AND landowner_type='indirect_landowner' AND tea_availability=1 ";
        // }
        $row = $this->db->runQuery($query);
                
        if($row) {
            return $row;
        }else {
            return 0;
        }
    }

    //add initial tea weight by agent
    function updateWeight($data = []){
        $landowner_id = $data['lid'];
        $weight = $data['initial_weight'];
        $emp_id = $data['agent_id'];
        
        $query = "INSERT INTO tea(lid, initial_weight_agent, agent_id)         
                    VALUES ('$landowner_id', '$weight','$emp_id')";
        $next_query = "UPDATE landowner SET tea_availability = '0' WHERE user_id = '$landowner_id'";
        $this->db->runQuery($query);
        $this->db->runQuery($next_query);

    }

    //get details to display in fertilizer request table
    function fertilizerdeliveryListTable(){
        $route_no=$_SESSION['route'];        
        $query = "SELECT request.request_id, request.request_type, request.lid, 
                 fertilizer_request.amount FROM request 
                  INNER JOIN fertilizer_request
                  ON  request.request_id = fertilizer_request.request_id                   
                 WHERE request.lid IN 
                (SELECT user_id FROM landowner WHERE route_no = '$route_no') 
                AND request.response_status = 'accept' AND request.complete_status = 0 ";
                
        $row = $this->db->runQuery($query);
        // return $row;
        // print_r($row);
        if($row) {
            return $row;
        }else {
            return 0;
        }
    }

    //get details to display advance requests table
    function advancedeliveryListTable(){
        $route_no=$_SESSION['route'];        
        $query = "SELECT request.request_id, request.request_type, request.lid, 
                 advance_request.amount_rs FROM request 
                  INNER JOIN advance_request
                  ON  request.request_id = advance_request.request_id                   
                 WHERE request.lid IN 
                (SELECT user_id FROM landowner WHERE route_no = '$route_no') 
                AND request.response_status = 'accept' AND request.complete_status = 0 ";
                
        $row = $this->db->runQuery($query);
        // return $row;
        // print_r($row);
        if($row) {
            return $row;
        }else {
            return 0;
        }
    }

    //add fertilizer requests when completed
    function updateFertilizerRequest($data = []){
        $date = $data['date'];
        $request_id = $data['rid'];        
        $emp_id = $data['agent_id'];

        $query1 = "UPDATE fertilizer_request SET date_delivered = '$date', agent_id = '$emp_id' WHERE request_id = '$request_id'";
        $query2 = "UPDATE request SET complete_status = '1' WHERE request_id = '$request_id'";

        $this->db->runQuery($query1);
        $this->db->runQuery($query2);
    }

//add advance requests when completed
    function updateAdvanceRequest($data = []){
        $date = $data['date'];
        $request_id = $data['rid'];        
        $emp_id = $data['agent_id'];

        $query1 = "UPDATE advance_request SET payment_day = '$date', agent_id = '$emp_id' WHERE request_id = '$request_id'";
        $query2 = "UPDATE request SET complete_status = '1' WHERE request_id = '$request_id'";

        $this->db->runQuery($query1);
        $this->db->runQuery($query2);

    }

    //search previous tea updates
    function searchTeaUpdates($data=[]){
        $date = $data['date'];
        $lid = $data['lid'];

        $query = "SELECT * FROM tea where lid = '$lid' AND date = '$date'";
        $row = $this->db->runQuery($query);

        if($row) {
            return $row;
        }else {
            return 0;
        }
    }

    //search previous fertilizer deliveries
    function searchFertilizerUpdates($data=[]){
        $date = $data['date'];
        $lid = $data['lid'];

        $query = "SELECT request.request_id,DATE(request.request_date),DATE(request.confirm_date), request.request_type, request.lid, 
        fertilizer_request.amount, fertilizer_request.agent_id,fertilizer_request.sup_id,
        DATE(fertilizer_request.date_delivered)
         FROM request 
         INNER JOIN fertilizer_request
         ON  request.request_id = fertilizer_request.request_id                   
        WHERE  request.lid ='$lid' AND DATE(request.request_date)='$date'";
        $row = $this->db->runQuery($query);

        if($row) {
            return $row;
        }else {
            return 0;
        }
    }

    //search previous advance deliveries
    function searchAdvanceUpdates($data=[]){
        $date = $data['date'];
        $lid = $data['lid'];

        $query = "SELECT request.request_id,DATE(request.request_date),DATE(request.confirm_date), request.request_type, request.lid, 
        advance_request.amount_rs, advance_request.agent_id,advance_request.acc_id,
        DATE(advance_request.payment_day)
         FROM request 
         INNER JOIN advance_request
         ON  request.request_id = advance_request.request_id                   
        WHERE  request.lid ='$lid' AND request.request_date='$date'";
        $row = $this->db->runQuery($query);

        if($row) {
            return $row;
        }else {
            return 0;
        }
    }
 
    //storing the emergency message needed to be sent to the manager
    function storeEmergencyMessage($data=[]){
        $message = $data['message'];
        $sender_id = $data['agent_id'];
    
        $query = "INSERT INTO notification( read_unread, seen_not_seen, message,
         receiver_type, notification_type, sender_id) VALUES
         ('0','0','$message','manager','emergency','$sender_id')"; 
         //have not added receiver_id and receive_datetime,Check into that.
         $query1 = "UPDATE agent SET availability='0' WHERE emp_id='$sender_id'";
         $this->db->runQuery($query);
         $this->db->runQuery($query1);
         //add the query to make the agent unavailable         
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
             WHERE receiver_type='Agent' ORDER BY read_unread ASC, notification_id DESC";
         } else if ($notification_type == 'half') {
             $query = "SELECT * FROM notification 
             WHERE receiver_type='Agent' AND read_unread=0 ORDER BY notification_id DESC";
         }
 
         $row = $this->db->runQuery($query);
 
         if (isset($data['notification_id'])) {
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
             WHERE receiver_type='Agent' ORDER BY notification_id DESC";
 
         $row = $this->db->runQuery($query);
         if (count($row)) {
             return $row;
         }
     }
     function getNotificationCount()
     {
         $query = "SELECT * FROM notification 
         WHERE receiver_type='Agent' AND seen_not_seen=0";
         $row = $this->db->runQuery($query);
 
         if (count($row)) {
             $_SESSION['NotSeenCount'] = count($row);
             if (isset($_GET['getCount']))
                 echo $_SESSION['NotSeenCount'];
         } else {
             $_SESSION['NotSeenCount'] = 0;
         }
     }
}





 // $query = "SELECT request_id, request_type, lid FROM request WHERE lid IN (SELECT user_id FROM landowner WHERE route_no = '$route_no')";
// advance_request.amount_rs 


// INNER JOIN advance_request
//                   ON  request.request_id = advance_request.request_id 
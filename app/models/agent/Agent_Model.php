<?php

class Agent_Model extends Model{

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

    function availableListTable(){
        $route_no=$_SESSION['route']; 
        $query = "SELECT user_id, no_of_estimated_containers FROM landowner WHERE route_no='$route_no' AND landowner_type='indirect_landowner' AND tea_availability=1 ";
        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function updateWeight($data = []){
        $date = $data['date'];
        $landowner_id = $data['lid'];
        $weight = $data['initial_weight'];
        $emp_id = $data['agent_id'];
        
        $query = "INSERT INTO tea(date, lid, initial_weight_agent, initial_weight_sup, water_precentage, container_precentage, matured_precentage, net_weight, sup_id, agent_id, quality)         
                    VALUES ('$date', '$landowner_id', '$weight', '0', '0', '0', '0','0', 'SUP-000','$emp_id', '0')";
        $next_query = "UPDATE landowner SET tea_availability = '0' WHERE user_id = '$landowner_id'";
        $this->db->runQuery($query);
        $this->db->runQuery($next_query);

    }

    function fertilizerdeliveryListTable(){
        $route_no=$_SESSION['route'];        
        $query = "SELECT request.request_id, request.request_type, request.lid, 
                 fertilizer_request.amount_kg FROM request 
                  INNER JOIN fertilizer_request
                  ON  request.request_id = fertilizer_request.request_id                   
                 WHERE request.lid IN 
                (SELECT user_id FROM landowner WHERE route_no = '$route_no') 
                AND request.response_status = 1";
                
        $row = $this->db->runQuery($query);
        // return $row;
        // print_r($row);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function advancedeliveryListTable(){
        $route_no=$_SESSION['route'];        
        $query = "SELECT request.request_id, request.request_type, request.lid, 
                 advance_request.amount_rs FROM request 
                  INNER JOIN advance_request
                  ON  request.request_id = advance_request.request_id                   
                 WHERE request.lid IN 
                (SELECT user_id FROM landowner WHERE route_no = '$route_no') 
                AND request.response_status = 1";
                
        $row = $this->db->runQuery($query);
        // return $row;
        // print_r($row);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }
   
}

 // $query = "SELECT request_id, request_type, lid FROM request WHERE lid IN (SELECT user_id FROM landowner WHERE route_no = '$route_no')";
// advance_request.amount_rs 


// INNER JOIN advance_request
//                   ON  request.request_id = advance_request.request_id 
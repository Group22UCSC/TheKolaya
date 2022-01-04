<?php

class Manager_Model extends Model {

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

    //Create Account
    function searchUserContact($contact_number) {
        $query = "SELECT * FROM user WHERE contact_number='$contact_number'";
        $row = $this->db->runQuery($query);
        if($row) {
            return $row[0]['contact_number'];
        }else {
            return false;
        }
    }

    function searchUserId($user_id) {
        $query = "SELECT * FROM user WHERE user_id='$user_id'";
        $row = $this->db->runQuery($query);
        if($row) {
            return $row[0]['user_id'];
        }else {
            return false;
        }
    }

     function availableListTable_landowners(){
        $query = "SELECT * FROM user WHERE user_type='Land_Owner' AND verify=1";
        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

     function viewProduct_instock(){
        $query = "SELECT * FROM products_in";
        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }


     function view_payments_table(){
       $query = "SELECT monthly_payment.toDate, 
       monthly_payment.fromDate,
       monthly_payment.fertilizer_expenses,
       monthly_payment.advance_expenses, 
       monthly_payment.income, 
       monthly_payment.final_payment, 
       monthly_payment.emp_id,  
       monthly_payment.lid ,
       user.user_id, 
       user.name
       FROM monthly_payment
       INNER JOIN user ON monthly_payment.lid = user.user_id";

        // $query = "SELECT * FROM monthly_payment";
        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }


    function view_instock(){
        $query = "SELECT * FROM in_stock";
        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

      function view_outstock(){
        $query = "SELECT * FROM out_stock";
        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

      function availableListTable(){
        $query = "SELECT *FROM user WHERE verify=1";
        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

// tea quality table
    function teaQualityTable(){
        $query = "SELECT landowner.user_id, 
        landowner.landowner_type,user.user_id, 
       user.name
       FROM landowner
       INNER JOIN user ON landowner.user_id = user.user_id";

        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }


      function getStock()
    {
        $query = "SELECT * FROM stock";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }


      function getStock2()
    {
        $query = "SELECT * FROM product";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

             // emergency 
    function storeEmergencyMessage($data=[]){
        $message = $data['message'];
        $receiver_id = $data['emp_id'];
        $sender_id = $data['user_id'];

        $query = "INSERT INTO notification( read_unread, seen_not_seen, message,
         receiver_type,sender_id, receiver_id) VALUES
         ('0','0','$message','Agent','$sender_id','$receiver_id')"; 
         //have not added receiver_id and receive_datetime,Check into that.
         $this->db->runQuery($query);
         //add the query to make the agent unavailable         
    }

     function emergencyTable(){
         $query = "SELECT agent.emp_id, 
       agent.route_no,
       agent.availability,
       user.user_id, 
       user.name
       FROM agent
       INNER JOIN user ON agent.emp_id = user.user_id WHERE availability=1 AND is_rejected=-1";

        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }


 function getNotificationCount()
    {
        $query = "SELECT * FROM notification 
        WHERE receiver_type='Supervisor' AND seen_not_seen=0";
        $row = $this->db->runQuery($query);

        if (count($row)) {
            $_SESSION['NotSeenCount'] = count($row);
            if (isset($_GET['getCount']))
                echo $_SESSION['NotSeenCount'];
        } else {
            $_SESSION['NotSeenCount'] = 0;
        }
    }

    
      function buyerTable(){
        $query = "SELECT * FROM buyer ";
        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }



}
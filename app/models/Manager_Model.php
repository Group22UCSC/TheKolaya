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

    function view_instock(){
        $query = "SELECT * FROM in_stock";
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



    function getRequests()
    {
        $query = "SELECT request.request_id, request.lid, DATE(request.request_date) AS request_date, user.name, fertilizer_request.amount 
                FROM user 
                INNER JOIN request 
                ON user.user_id=request.lid 
                INNER JOIN fertilizer_request 
                ON fertilizer_request.request_id=request.request_id 
                WHERE request.response_status='receive'";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function manageRequests($data)
    {
        $request_id = $data['request_id'];
        $response_status = $data['response_status'];
        $query = "UPDATE request SET response_status='$response_status' WHERE request_id='$request_id'";

        $this->db->runQuery($query);
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

}
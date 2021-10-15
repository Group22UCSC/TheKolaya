<?php

class Admin_Model extends Model {

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

    //CheckDetails
    function checkTable(){
        $userTypes = ['Accountant', 'Admin', 'Agent', 'Manager', 'Land_Owner', 'Product_Manager', 'Supervisor'];
        $users = array();
        for($i = 0; $i < count($userTypes); $i++) {
            $query = "SELECT * FROM user 
                WHERE user_type='".$userTypes[$i]."' 
                ORDER BY created_at DESC";
            
            $row = $this->db->runQuery($query);
            $users[$i] = $row[0]['user_id'];
        }

        $query = "SELECT user_id, user_type, contact_number 
                FROM user
                WHERE user_id='".$users[0]."' 
                OR user_id='".$users[1]."' 
                OR user_id='".$users[2]."' 
                OR user_id='".$users[3]."' 
                OR user_id='".$users[4]."' 
                OR user_id='".$users[5]."' 
                OR user_id='".$users[6]."' 
                ";
        $row = $this->db->runQuery($query);

        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function userRegistration($data = []) {
        $name = $data['name'];
        $contact_number = $data['mobile_number'];
        $user_id = $data['reg_id'];
        $user_type = $data['reg_type'];
        $verify = 0;
        if($_SESSION['account_type'] == 'full' || $_SESSION['account_type'] == 'agentLandFull') {
            $address = $data['address'];
            $password = $data['password'];
            $verify = 1;
        }
        $route_number = null;
        
        if($data['reg_type'] == 'direct_landowner' || $data['reg_type'] == 'indirect_landowner'){
            $user_type = 'Land_Owner';
            $landowner_type = $data['reg_type'];
            $route_number = $data['route_number'];
        }else if ($data['reg_type'] == 'agent') {
            $route_number = $data['route_number'];
        }

        if($_SESSION['account_type'] == 'full' || $_SESSION['account_type'] == 'agentLandFull') {
            $query = "INSERT INTO user(user_id, name, address, contact_number, user_type, password, verify) values('$user_id', '$name', '$address', '$contact_number', '$user_type', '$password', '$verify')";
            $queryUser = null;
            switch($user_type) {
                case 'accountant' :
                    $queryUser = "INSERT INTO accountant(emp_id) values('$user_id')";
                    break;
                
                case 'admin' :
                    $queryUser = "INSERT INTO admin(emp_id) values('$user_id')";
                    break;
                
                case 'agent' :
                    $queryUser = "INSERT INTO agent(emp_id, route_no, availability) values('$user_id', '$route_number', 1)";
                    break;
                
                case 'manager' :
                    $queryUser = "INSERT INTO manager(emp_id) values('$user_id')";
                    break;

                case 'Land_Owner' :
                    $queryUser = "INSERT INTO landowner(user_id, contact_number, landowner_type, route_no) values('$user_id', '$contact_number', '$landowner_type', '$route_number')";
                    break;

                case 'product_manager' :
                    $queryUser = "INSERT INTO product_manager(emp_id) values('$user_id')";
                    break;

                case 'supervisor' :
                    $queryUser = "INSERT INTO supervisor(emp_id) values('$user_id')";
                    break;
            }

            $this->db->runQuery($query);
            $this->db->runQuery($queryUser);
        }else {
            $query = "INSERT INTO user(user_id, contact_number, user_type, verify) values('$user_id', '$contact_number', '$user_type', '$verify')";
            $this->db->runQuery($query);
        }
        
    }


    function availableListTable(){
        $query = "SELECT name,user_id,user_type FROM user WHERE verify=1";
        $row = $this->db->runQuery($query);
        
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

}
?>
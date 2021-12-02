<?php

class Registration_Model extends Model {

    function __construct()
    {
        parent::__construct();
    }

    //Register a user
    public function registration($data) {
        $name = $data['name'];
        $contact_number = $data['contact_number'];
        $user_id = $data['user_id'];
        $address = $data['address'];
        $password = $data['password'];
        $verify = $data['verify'];
        $user_type = $data['user_type'];
        // $landowner_type = null;
        
        // if($user_type == 'direct_landowner' || $user_type == 'indirect_landowner') {
        //     $landowner_type = $user_type;
        //     $user_type = 'Land_Owner';
        // }
        
        if($user_type && $verify != 0) {
            $query = "UPDATE user SET  name='$name', address='$address', verify='$verify', password='$password' WHERE contact_number='$contact_number'";
            switch($user_type) {
                case 'accountant' :
                    $queryUser = "INSERT INTO accountant(emp_id) values('$user_id')";
                    break;
                
                case 'admin' :
                    $queryUser = "INSERT INTO admin(emp_id) values('$user_id')";
                    break;
                
                case 'manager' :
                    $queryUser = "INSERT INTO manager(emp_id) values('$user_id')";
                    break;

                case 'product_manager' :
                    $queryUser = "INSERT INTO product_manager(emp_id) values('$user_id')";
                    break;

                case 'supervisor' :
                    $queryUser = "INSERT INTO supervisor(emp_id) values('$user_id')";
                    break;
                    
            }
            $this->db->runQuery($query);
            if(!($user_type=='agent' || $user_type=='Land_Owner')){
                $this->db->runQuery($queryUser);
            }
            
        }
    }

    public function checkUserByUserID($data) {
        $contact_number = $data['contact_number'];
        $user_id = $data['user_id'];
        $query = "SELECT * FROM user WHERE contact_number='$contact_number'";
        $row = $this->db->runQuery($query);
        if($row[0]['user_id'] == $user_id) {
            return true;
        }else {
            return false;
        }
    }

    public function isVerifiedUser($contact_number) {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number' AND verify = 1";

        $row = $this->db->runQuery($query);

        if(count($row)) {
            return true;
        }else {
            return false;
        }
    }

    function isRegisteredUser($contact_number) {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number' AND verify = 0";
        $row = $this->db->runQuery($query);
        if(!empty($row)) {
            return $row;
        }else {
            return false;
        }
    }

    public function checkUserByUserType($data) {
        $user_type = $data['user_type'];
        $contact_number = $data['contact_number'];
        $user_id = $data['user_id'];
        if($user_type == 'direct_landowner' || $user_type == 'indirect_landowner') {
            $user_type = 'Land_Owner';
        }
        $query = "SELECT * FROM user WHERE contact_number='$contact_number' AND user_id='$user_id' AND user_type='$user_type'";
        $row = $this->db->runQuery($query);

        if(count($row)) {
            return true;
        }else {
            return false;
        }
    }

    public function findUser($contact_number, $user_id) {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number' AND user_id = '$user_id'";

        $row = $this->db->runQuery($query);

        if(count($row)) {
            return true;
        }else {
            return false;
        }
    }

    // //Login a user
    // public function login($contact_number, $password) {
    //     $query = "SELECT * FROM user WHERE contact_number = '$contact_number'";

    //     $row = $this->db->runQuery($query);
        
    //     $hashed_password = $row[0]['password'];

    //     if(password_verify($password, $hashed_password)) {
    //         return $row;
    //     }else {
    //         return false;
    //     }
    // }

}

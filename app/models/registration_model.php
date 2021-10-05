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
        // $verify = 0;
        $user_type = 'supervisor';
        $landowner_type = $data['landowner_type'];
        

        // $query = "INSERT INTO user(user_id, name, address, contact_number, user_type, password, verify) values('$user_id','$name','$address', '$contact_number', '$user_type', '$password',".$verify.")";
        
        if($user_type && $verify != 0) {
            $query = "UPDATE user SET user_id='$user_id', name='$name', address='$address', verify='$verify', password='$password' WHERE contact_number='$contact_number'";
            switch($user_type) {
                case 'accountant' :
                    $queryUser = "INSERT INTO accountant(emp_id) values('$user_id')";
                    break;
                
                case 'admin' :
                    $queryUser = "INSERT INTO admin(emp_id) values('$user_id')";
                    break;
                
                case 'agent' :
                    $queryUser = "INSERT INTO agent(emp_id) values('$user_id')";
                    break;
                
                case 'manager' :
                    $queryUser = "INSERT INTO manager(emp_id) values('$user_id')";
                    break;

                case 'Land_Owner' :
                    $queryUser = "INSERT INTO landowner(user_id, contact_number, landowner_type) values('$user_id', '$contact_number', '$landowner_type')";
                    break;

                case 'product_manager' :
                    $queryUser = "INSERT INTO product_manager(emp_id) values('$user_id')";
                    break;

                case 'supervisor' :
                    $queryUser = "INSERT INTO supervisor(emp_id) values('$user_id')";
                    break;
                    
            }
            $this->db->updateQuery($query);
            $this->db->insertQuery($queryUser);
        }
        // $this->db->insertQuery($query);
    }

    public function findUser($contact_number, $user_id) {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number' AND user_id = '$user_id'";

        $row = $this->db->searchQuery($query);

        if(count($row)) {
            return true;
        }else {
            return false;
        }
    }

    public function isRegisteredUser($contact_number) {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number' AND verify = 1";

        $row = $this->db->searchQuery($query);

        if(count($row)) {
            return true;
        }else {
            return false;
        }
    }

    //Login a user
    public function login($contact_number, $password) {
        $query = "SELECT * FROM user WHERE contact_number = '$contact_number'";

        $row = $this->db->searchQuery($query);
        
        $hashed_password = $row[0]['password'];

        if(password_verify($password, $hashed_password)) {
            return $row;
        }else {
            return false;
        }
    }

}

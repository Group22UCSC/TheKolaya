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

    function userRegistration($data = []) {
        $name = $data['name'];
        $contact_number = $data['contact_number'];
        $user_id = $data['user_id'];
        $address = $data['address'];
        $password = $data['password'];
        $user_type = $data['user_type'];
        $route_number = $data['route_number'];
        $verify = 1;
        if($data['user_type'] == 'direct_landowner' || $data['user_type'] == 'indirect_landowner'){
            $user_type = 'Land_Owner';
            $landowner_type = $data['user_type'];
        }
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
                $queryUser = "INSERT INTO agent(emp_id, route_no) values('$user_id', '$route_number')";
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
    }

    function userTempRegistration($data = []) {
        $contact_number = $data['contact_number'];
        $user_id = $data['user_id'];
        $route_number = $data['route_number'];
        $verify = 0;
        if($data['user_type'] == 'direct_landowner' || $data['user_type'] == 'indirect_landowner'){
            $user_type = 'Land_Owner';
            $landowner_type = $data['user_type'];
        }
        $query = "INSERT INTO user(user_id, contact_number, user_type, verify) values('$user_id', '$contact_number', '$user_type', '$verify')";
        $queryUser = null;

        switch($user_type) {
            case 'accountant' :
                $queryUser = "INSERT INTO accountant(emp_id) values('$user_id')";
                break;
            
            case 'admin' :
                $queryUser = "INSERT INTO admin(emp_id) values('$user_id')";
                break;
            
            case 'agent' :
                $queryUser = "INSERT INTO agent(emp_id, route_number) values('$user_id', '$route_number')";
                break;
            
            case 'manager' :
                $queryUser = "INSERT INTO manager(emp_id) values('$user_id')";
                break;

            case 'Land_Owner' :
                $queryUser = "INSERT INTO landowner(user_id, contact_number, landowner_type, route_number) values('$user_id', '$contact_number', '$landowner_type', '$route_number')";
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
    }




     function userRegistration11($data = []) {
        $name = $data['name'];
        $contact_number = $data['contact_number'];
        $user_id = $data['user_id'];
        $address = $data['address'];
        $password = $data['password'];
        $user_type = $data['user_type'];
        // $route_number = $data['route_number'];
        $verify = 1;
        if($data['user_type'] == 'direct_landowner' || $data['user_type'] == 'indirect_landowner'){
            $user_type = 'Land_Owner';
            $landowner_type = $data['user_type'];
        }
        // $query = "UPDATE user SET(user_id, name, address, contact_number, user_type, password, verify) values('$user_id', '$name', '$address', '$contact_number', '$user_type', '$password', '$verify')";


         $query="UPDATE user SET";
         $query="user_id= {$user_id},";
          $query="name= {$name},";
           $query="address= {$address},";
            $query="contact_number= {$contact_number},";
             $query="user_type= {$user_type},";
              $query="password= {$password},";
               $query="verify= {$verify},";

        $queryUser = null;
        switch($user_type) {
            case 'accountant' :
                $queryUser = "INSERT INTO accountant(emp_id) values('$user_id')";
                break;
            
            case 'admin' :
                $queryUser = "INSERT INTO admin(emp_id) values('$user_id')";
                break;
            
            case 'agent' :
                $queryUser = "INSERT INTO agent(emp_id, route_no) values('$user_id', '$route_number')";
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
    }

   
   
    //Test
    function testModel(){
       $query="SELECT * FROM product";
       return $this->db->runQuery($query);
    }
   //auctionDetails
    function auction(){
        

        // $query = "SELECT auction.date,product.product_id, product.product_name, auction.sold_amount, auction.sold_price,buyer.name
        //         FROM auction 
        //         INNER JOIN product 
        //         ON auction.product_id=product.product_id 
        //         INNER JOIN buyer 
        //         ON auction.buyer_id=buyer.buyer_id";

        $query = "SELECT user_id,contact_number,landowner_type, route_no 
                FROM landowner ";
        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function teaPriceTable(){
        $query = "SELECT * FROM monthly_tea_price";
        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }
    






}
?>
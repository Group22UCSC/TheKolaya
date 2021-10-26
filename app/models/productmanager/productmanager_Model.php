<?php

use function PHPSTORM_META\type;

class productmanager_Model extends Model {

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
    //get buyers details
    function getBuyersDetails(){
        $query = "SELECT buyer_id,name FROM buyer";
        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }
    //auctionDetails
    function auction(){
        

        $query = "SELECT auction.date,product.product_id, product.product_name, auction.sold_amount, auction.sold_price,buyer.name,buyer.buyer_id
                FROM auction 
                INNER JOIN product 
                ON auction.product_id=product.product_id 
                INNER JOIN buyer 
                ON auction.buyer_id=buyer.buyer_id ORDER BY auction.date DESC";
        $row = $this->db->selectQuery($query);
        //echo gettype($row);
        //$var1 = json_encode($row, JSON_FORCE_OBJECT);
        if($row){
            return $row;
        }else {
            return false;
        }
    }


    function getProductDetails(){
        $query = "SELECT product_id,product_name,amount FROM product";
        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }
    function insertAution(){
            date_default_timezone_set('Asia/Colombo');
            $date=date("Y-m-d h:i:s a");
            $pid=$_POST['pid'];
            $amount=$_POST['amount'];
            $price=$_POST['price'];
            $bid=$_POST['bid'];
            $emp_id=$_SESSION['user_id'];
            $query = "INSERT INTO auction (date,product_id,buyer_id,sold_price,sold_amount,emp_id) VALUES ('{$date}','{$pid}','{$bid}','{$price}','{$amount}','{$emp_id}')";
            $row = $this->db->insertQuery($query);
            //print_r($row);
            if($row){
                return true;
            }else {
                return false;
            }
    }
    
}
?>
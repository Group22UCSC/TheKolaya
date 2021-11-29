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
            $teaPrice=$_POST['teaPrice'];
            // HAS TO CHANGE THIS
            $emp_id=$_SESSION['user_id'];
            $query = "INSERT INTO monthly_tea_price (date,price,emp_id) VALUES ('{$date}','{$teaPrice}','{$emp_id}')";
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
    
}
?>
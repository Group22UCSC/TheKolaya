<?php

use function PHPSTORM_META\type;

class Productmanager_Model extends Model {

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
        $query = "SELECT product_id,product_name,stock FROM product";
        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }
    function insertAution(){ // insert auction details to auction and update changed stock
                            //to the products table
            
            date_default_timezone_set('Asia/Colombo');
            $date=date("Y-m-d H:i:s");
            $pid=$_POST['pid'];
            $amount=$_POST['amount'];
            $price=$_POST['price'];
            $bid=$_POST['bid'];
            $emp_id=$_SESSION['user_id'];
            
            
            // get the details of the products(The current stock);
            $getCurrentStockQuery="SELECT stock FROM product WHERE product_id='{$pid}'";
            $rslt=$this->db->runQuery($getCurrentStockQuery);
            $currentStock=$rslt[0]['stock'];
            
            
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "INSERT INTO auction (date,product_id,buyer_id,sold_price,sold_amount,emp_id) VALUES ('{$date}','{$pid}','{$bid}','{$price}','{$amount}','{$emp_id}')";
            $newStock=$currentStock-$amount;
            //$newStock=1999;
            $query2="UPDATE product SET stock='{$newStock}' WHERE product_id='{$pid}'";
            // $newstckrslt=$this->db->runQuery($query2);

           // $_SESSION['newstck']=$newStock;
            //$query2="UPDATE"
        try{ 
            $this->db->beginTransaction();
            $row = $this->db->insertQuery($query);
            $row2 = $this->db->insertQuery($query2);
            //print_r($row);
            $this->db->commit();
            if($row){
                return true;
            }else {
                return false;
            }
        }
        catch( PDOException $e){
            $this->db->rollback();
            throw $e;
        }
    }
    function getProductStock(){ // to check whether there is enough stock to sell in the auction
        //we check the available amount of stock from the related product(product_id)
        $pid=$_GET['pid'];
        $query = "SELECT stock FROM product WHERE product_id='{$pid}'";
        $row = $this->db->runQuery($query);
        if($row) {
            return $row;
        }else {
            return false;
        }
    }

    function insertProduct(){
        date_default_timezone_set('Asia/Colombo');
        $date=date("Y-m-d H:i:s");
        $pid=$_POST['pid'];
        $amount=(float)$_POST['amount'];
        $emp_id=$_SESSION['user_id'];
        
        
        // get the details of the products(The current stock);
        $getCurrentStockQuery="SELECT stock FROM product WHERE product_id='{$pid}'";
        $rslt=$this->db->runQuery($getCurrentStockQuery);
        $currentStock=(float)$rslt[0]['stock'];
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $query = "INSERT INTO products_in(products_id,date,amount,emp_id) VALUES ('{$pid}','{$date}','{$amount}','{$emp_id}')";
            $newStock=($currentStock)+($amount);
            //$adding the new amount to stock table     
            $query2="UPDATE product SET stock='{$newStock}' WHERE product_id='{$pid}'";
            // $newstckrslt=$this->db->runQuery($query2);

           // $_SESSION['newstck']=$newStock;
            //$query2="UPDATE"
        try{ 
            $this->db->beginTransaction();
            $row = $this->db->insertQuery($query);
            $row2 = $this->db->insertQuery($query2);
            //print_r($row);
            $this->db->commit();
            if($row2){
                return true;
            }else {
                return false;
            }
        }
        catch( PDOException $e){
            $this->db->rollback();
            throw $e;
        }
    }

    function getProductsINTable(){
        $query1 = "SELECT products_in.date,products_in.products_id, product.product_name, products_in.amount
                FROM products_in 
                INNER JOIN product 
                ON products_in.products_id=product.product_id 
                ORDER BY products_in.date DESC";
        $query="SELECT * FROM products_in";
        $row = $this->db->selectQuery($query1);
        //echo gettype($row);
        //$var1 = json_encode($row, JSON_FORCE_OBJECT);
        if($row){
            return $row;
        }else {
            return false;
        }
    }

    //get the auction income of the last 30 days
    function AuctionIncome30(){
        
        $dateToday=date('Y-m-d'); // todays date
        $dateBack30 = date('Y-m-d', strtotime('-30 days')); // 30 days ago
        $query="SELECT `date`, `sold_amount`,`sold_price` FROM `auction` WHERE date BETWEEN '{$dateBack30}' AND '{$dateToday}'";
        $row = $this->db->selectQuery($query);
        //echo gettype($row);
        //$var1 = json_encode($row, JSON_FORCE_OBJECT);
        if($row){
            return $row;
        }else {
            return false;
        }
    }
    
}
?>
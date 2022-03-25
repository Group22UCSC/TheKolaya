<?php

use function PHPSTORM_META\type;

class Productmanager_Model extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function editProfile()
    {
        $contact_number = $_SESSION['contact_number'];
        $name = $_SESSION['name'];
        $user_id = $_SESSION['user_id'];
        $query = "UPDATE user SET contact_number='$contact_number', name='$name' WHERE user_id='$user_id'";
        $this->db->runQuery($query);
    }

    function checkPassword($data)
    {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM user WHERE user_id='$user_id'";

        $row = $this->db->runQuery($query);
        $hashed_password = $row[0]['password'];

        if (password_verify($data['password'], $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    function changePassword($data = [])
    {
        $new_password = $data['new_password'];
        $contact_number = $_SESSION['contact_number'];

        $query = "UPDATE user SET password='$new_password' WHERE contact_number='$contact_number'";
        $row = $this->db->runQuery($query);
        if ($row) {
            return true;
        } else {
            return false;
        }
    }

    //Test
    function testModel()
    {
        $query = "SELECT * FROM product";
        return $this->db->runQuery($query);
    }
    //get buyers details
    function getBuyersDetails()
    {
        $query = "SELECT buyer_id,name FROM buyer";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
    //auctionDetails
    function auction()
    {


        $query = "SELECT auction.date,product.product_id, product.product_name, auction.sold_amount, auction.sold_price,buyer.name,buyer.buyer_id
                FROM auction 
                INNER JOIN product 
                ON auction.product_id=product.product_id 
                INNER JOIN buyer 
                ON auction.buyer_id=buyer.buyer_id ORDER BY auction.date DESC";
        $row = $this->db->selectQuery($query);
        //echo gettype($row);
        //$var1 = json_encode($row, JSON_FORCE_OBJECT);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }


    function getProductDetails()
    {
        $query = "SELECT product_id,product_name,stock FROM product";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
    function insertAution()
    { // insert auction details to auction and update changed stock
        //to the products table

        date_default_timezone_set('Asia/Colombo');
        $date = date("Y-m-d H:i:s");
        $pid = $_POST['pid'];
        $amount = $_POST['amount'];
        $price = $_POST['price'];
        $bid = $_POST['bid'];
        $emp_id = $_SESSION['user_id'];


        // get the details of the products(The current stock);
        $getCurrentStockQuery = "SELECT stock FROM product WHERE product_id='{$pid}'";
        $rslt = $this->db->runQuery($getCurrentStockQuery);
        $currentStock = $rslt[0]['stock'];


        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO auction (date,product_id,buyer_id,sold_price,sold_amount,emp_id) VALUES ('{$date}','{$pid}','{$bid}','{$price}','{$amount}','{$emp_id}')";
        $newStock = $currentStock - $amount;
        //$newStock=1999;
        $query2 = "UPDATE product SET stock='{$newStock}' WHERE product_id='{$pid}'";
        // $newstckrslt=$this->db->runQuery($query2);

        // $_SESSION['newstck']=$newStock;
        //$query2="UPDATE"
        try {
            $this->db->beginTransaction();
            $row = $this->db->insertQuery($query);
            $row2 = $this->db->insertQuery($query2);
            //print_r($row);
            $this->db->commit();
            if ($row) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $this->db->rollback();
            throw $e;
        }
    }
    function getProductStock()
    { // to check whether there is enough stock to sell in the auction
        //we check the available amount of stock from the related product(product_id)
        $pid = $_GET['pid'];
        $query = "SELECT stock FROM product WHERE product_id='{$pid}'";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function insertProduct()
    {
        date_default_timezone_set('Asia/Colombo');
        $date = date("Y-m-d H:i:s");
        $pid = $_POST['pid'];
        $amount = (float)$_POST['amount'];
        $emp_id = $_SESSION['user_id'];


        // get the details of the products(The current stock);
        $getCurrentStockQuery = "SELECT stock FROM product WHERE product_id='{$pid}'";
        $rslt = $this->db->runQuery($getCurrentStockQuery);
        $currentStock = (float)$rslt[0]['stock'];
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $query = "INSERT INTO products_in(products_id,date,amount,emp_id) VALUES ('{$pid}','{$date}','{$amount}','{$emp_id}')";
        $newStock = ($currentStock) + ($amount);
        //$adding the new amount to stock table     
        $query2 = "UPDATE product SET stock='{$newStock}' WHERE product_id='{$pid}'";
        // $newstckrslt=$this->db->runQuery($query2);

        // $_SESSION['newstck']=$newStock;
        //$query2="UPDATE"
        try {
            $this->db->beginTransaction();
            $row = $this->db->insertQuery($query);
            $row2 = $this->db->insertQuery($query2);
            //print_r($row);
            $this->db->commit();
            if ($row2) {
                return true;
            } else {
                return false;
            }
        } catch (PDOException $e) {
            $this->db->rollback();
            throw $e;
        }
    }

    function getProductsINTable()
    {
        $query1 = "SELECT products_in.date,products_in.products_id, product.product_name, products_in.amount
                FROM products_in 
                INNER JOIN product 
                ON products_in.products_id=product.product_id 
                ORDER BY products_in.date DESC";
        $query = "SELECT * FROM products_in";
        $row = $this->db->selectQuery($query1);
        //echo gettype($row);
        //$var1 = json_encode($row, JSON_FORCE_OBJECT);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    // *********** dashbboard boxes  *******************

    //get the auction income of the last 30 days
    function AuctionIncome30()
    {
        // $from=date('Y-m-d',strtotime($_POST['from']));GGG
        // 		$to=date('Y-m-d',strtotime($_POST['to']));
        $dateTomorow = date('Y-m-d', strtotime("+1 day")); // todays date
        $dateBack30 = date('Y-m-d', strtotime('-30 days')); // 30 days ago
        $query = "SELECT `date`, `sold_amount`,`sold_price` FROM `auction` WHERE date>= '$dateBack30' AND date <'$dateTomorow'";
        //details are not coming for 30 days
        $row = $this->db->selectQuery($query);


        //echo gettype($row);
        //$var1 = json_encode($row, JSON_FORCE_OBJECT);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
    function last30ProductSales()
    { // for the pie chart 
        $dateTomorow = date('Y-m-d', strtotime("+1 day")); // todays date
        $dateBack30 = date('Y-m-d', strtotime('-30 days')); // 30 days ago
        $query = "SELECT auction.product_id, auction.sold_amount,product.product_name 
        FROM `auction` 
        INNER JOIN product ON product.product_id=auction.product_id
        WHERE auction.date>= '$dateBack30' AND auction.date <'$dateTomorow'";
        //details are not coming for 30 days
        $row = $this->db->selectQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
    //dashboard sold teta stock of last 30 days
    function totSales30()
    {
        // $from=date('Y-m-d',strtotime($_POST['from']));GGG
        // 		$to=date('Y-m-d',strtotime($_POST['to']));
        $dateTomorow = date('Y-m-d', strtotime("+1 day")); // todays date
        $dateBack30 = date('Y-m-d', strtotime('-30 days')); // 30 days ago
        $query = "SELECT `sold_amount`FROM `auction` WHERE date>= '$dateBack30' AND date <'$dateTomorow'";
        //details are not coming for 30 days
        $row = $this->db->selectQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function totTeaStockNow()
    {
        $query = "SELECT `stock`FROM `product`";
        $row = $this->db->selectQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    // *********** END OF  dashbboard boxes  *******************
    // dashboard bar chart
    function incomeBarChart()
    { //details of the income to the factory for the bar chart of accountant dashboard

        $year = date('Y');
        $month = date('m') - 1;
        // return $month;
        $date = date('Y-m-01', strtotime("-7 month")); // 7 months ago date
        // $first = date('Y-m-01',$date);
        // return $date;
        $query = "SELECT date,sold_price,sold_amount FROM auction where date >='{$date}'";
        $row = $this->db->selectQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    //Get Notification
    function getNotification($data = [])
    {
        $notification_type = $data['notification_type'];
        if (isset($data['notification_id'])) {
            $notification_id = $data['notification_id'];
            $query = "UPDATE notification 
         SET read_unread=1 WHERE notification_id='$notification_id'";
            $this->db->runQuery($query);
        }
        if ($notification_type == 'full') {
            $query = "SELECT * FROM notification 
         WHERE receiver_type='ProductManager' ORDER BY read_unread ASC, notification_id DESC";
        } else if ($notification_type == 'half') {
            $query = "SELECT * FROM notification 
         WHERE receiver_type='ProductManager' AND read_unread=0 ORDER BY notification_id DESC";
        }

        $row = $this->db->runQuery($query);

        if (isset($data['notification_id'])) {
            if (count($row)) {
                return $row;
            } else {
                return false;
            }
        }

        $query = "UPDATE notification
             SET seen_not_seen=1 WHERE seen_not_seen=0";
        $this->db->runQuery($query);
        $_SESSION['NotSeenCount'] = '';
        echo '<p>' . $_SESSION["NotSeenCount"] . '</p>';
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function updateReadNotification($notification_id)
    {
        $query = "UPDATE notification 
    SET read_unread=1 WHERE notification_id='$notification_id'";
        $this->db->runQuery($query);

        $query = "SELECT * FROM notification 
        WHERE receiver_type='ProductManager' ORDER BY notification_id DESC";

        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        }
    }
    function getNotificationCount()
    {
        $query = "SELECT * FROM notification 
    WHERE receiver_type='ProductManager' AND seen_not_seen=0";
        $row = $this->db->runQuery($query);

        if (count($row)) {
            $_SESSION['NotSeenCount'] = count($row);
            if (isset($_GET['getCount']))
                echo $_SESSION['NotSeenCount'];
        } else {
            $_SESSION['NotSeenCount'] = 0;
        }
    }
    function sendOutOfStockNoti($pid,$availableStock){
        $message="Product $pid is running out of stock !. Available amount is : $availableStock Kg";
        $notificationQuery = "INSERT INTO notification(read_unread, seen_not_seen, message, receiver_type, notification_type, sender_id) 
            VALUES(0, 0, '$message', 'ProductManager', 'warning', '" . $_SESSION['user_id'] . "')";
        
        $row = $this->db->insertQuery($notificationQuery);
        //----------------Pusher API------------------//
        $options = array(
            'cluster' => 'ap1',
            'useTLS' => true
        );
        $pusher = new Pusher\Pusher(
            'ef64da0120ca27fe19a3',
            'd5033393ff3b228540f7',
            '1290222',
            $options
        );

        $pusher->trigger('my-channel', 'Productmanager_notification',$message);
        //-------------------------------------------//
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function deleteAuctionDetail($pid,$date){
        $query = "DELETE FROM `auction` WHERE date='{$date}' AND product_id='{$pid}'";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }
}

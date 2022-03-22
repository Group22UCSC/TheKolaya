<?php

class landowner_Model extends Model
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




    function insertRequest($data = [])
    {
        $requests_type = $data['rtype'];
        $request_amount = null;
        $request_amount = $data['fertilizer_amount'];
        if ($data['rtype'] == 'Fertilizer') {
            $requests_type = 'fertilizer';
            $request_amount = $data['fertilizer_amount'];
        } else if ($data['rtype'] == 'Advance') {
            $requests_type = 'advance';
            $request_amount = $data['advance_amount'];
        }

        $lid = $_SESSION['user_id'];
        $query = "INSERT INTO request(request_type, lid, response_status) VALUES('$requests_type', '$lid', 'receive')";
        $this->db->runQuery($query);
        if ($requests_type == 'fertilizer') {
            $query = "INSERT INTO fertilizer_request(request_id, amount) VALUES(LAST_INSERT_ID(), '$request_amount')";
            $this->db->runQuery($query);

            //-------------Pusher API--------------//
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

            $data['message'] = 'hello world';
            $pusher->trigger('my-channel', 'today_fertilizer_request', $data);
            //--------------------------------------//


            $message = $_SESSION['name'] . " requested " . $request_amount . "kg of fertilizer.";
            $notificationQuery = "INSERT INTO notification(read_unread, seen_not_seen, message, receiver_type, notification_type, sender_id) 
            VALUES(0, 0, '$message', 'Supervisor', 'request', '" . $_SESSION['user_id'] . "')";
            $this->db->runQuery($notificationQuery);

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

            $data['message'] = 'hello world';
            $pusher->trigger('my-channel', 'Supervisor_notification', $data);
            //-------------------------------------------//
        } else if ($requests_type == 'advance') {
            $query = "INSERT INTO advance_request(request_id, amount_rs) VALUES(LAST_INSERT_ID(), '$request_amount')";
            $this->db->runQuery($query);
            $message = $_SESSION['name'] . " requested an advance of Rs." . $request_amount;
            $notificationQuery = "INSERT INTO notification(read_unread, seen_not_seen, message, receiver_type, notification_type, sender_id) 
            VALUES(0, 0, '$message', 'Accountant', 'request', '" . $_SESSION['user_id'] . "')";
            $this->db->runQuery($notificationQuery);
        }
    }





    function Update_Tea_Availability($data = [])
    {
        $containers = $data['no_of_estimated_containers'];
        $availability = $data['tea_availability'];
        $user_id = $_SESSION['user_id'];

        if ($containers != '') {
            $query = "UPDATE landowner 
                SET tea_availability=" . $availability . ", no_of_estimated_containers=" . $containers . " 
                WHERE user_id='$user_id'";
        } else {
            $query = "UPDATE landowner 
                SET tea_availability=" . $availability . ", no_of_estimated_containers=0 
                WHERE user_id='$user_id'";
        }

        $this->db->runQuery($query);
    }




    public function getAvailability()
    {
        $user_id = $_SESSION['user_id'];
        $query = "SELECT * FROM landowner WHERE user_id='$user_id'";
        $row = $this->db->runQuery($query);

        if (!empty($row)) {
            return $row;
        } else {
            return false;
        }
    }




    //test
    function Test()
    {
        $date = date("Y-m-d");
        $requests_type = $_POST['rtype'];
    }



    //monthly tea price
    function teaPriceTable()
    {
        $query = "SELECT * FROM monthly_tea_price";
        $row = $this->db->selectQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }




    // get last date weight details
    function getLandonwerTable()
    {
        $lid = $_SESSION['user_id'];
        $query = "SELECT * FROM tea WHERE lid='{$lid}' ORDER BY date DESC LIMIT 1";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }




    //get search date weight details
    function searchDailyDetails()
    {
        $lid = $_SESSION['user_id'];

        $date = $_POST['searchDate'];
        $query = "SELECT * FROM tea WHERE lid='{$lid}' AND date='{$date}'  ";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }




    //get last month income and advance to dashboard card
    function lastMonthIncomeAndAdvance()
    {
        $lid = $_SESSION['user_id'];
        $query = "SELECT * FROM monthly_payment WHERE lid='{$lid}' ORDER BY Date DESC LIMIT 1 ";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }




    //get last month tea qulity to dashboard card
    function getTeaQulity()
    {
        $user_id = $_SESSION['user_id'];


        $first = date('Y-m-01');
        $last  = date('Y-m-t');
        $sql = "SELECT quality FROM tea WHERE lid='{$user_id}' AND date <='{$last}' AND date >= '{$first}' ";
        $row = $this->db->selectQuery($sql);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }




    //get last month fertilizer usage to dashboard card
    function fertilizerUsage()
    {
        $first = date('Y-m-01');
        $last  = date('Y-m-t');
        $sql = "SELECT fertilizer_request.amount
        FROM fertilizer_request 
        INNER JOIN request ON request.request_id=fertilizer_request.request_id 
        WHERE fertilizer_request.date_delivered BETWEEN '{$first}'AND '{$last}' ";
        $row = $this->db->selectQuery($sql);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }





    //CHART VALUES FOR DASHBOARD
    function chartValuse()
    {
        $lid = $_SESSION['user_id'];
        $query = "SELECT date,net_weight FROM tea WHERE lid='{$lid}' ORDER BY Date DESC LIMIT 7";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }




    //get VALUES to monthly_income
    function getMonthlyIncome()
    {
        $lid = $_SESSION['user_id'];
        $query = "SELECT * FROM tea WHERE lid='{$lid}'";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    //Delete requsests 
    function requestTable()
    {
        $query = "SELECT * FROM request WHERE response_status = 'receive'";
        $row = $this->db->selectQuery($query);
        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function deleteRequestRow()
    {
        $date = $_POST['date'];
        $query = " DELETE FROM `monthly_tea_price` WHERE date='{$date}'";
        $row = $this->db->insertQuery($query);
        $result = $this->db->deleteQuery($query);
        echo $result;
    }
}

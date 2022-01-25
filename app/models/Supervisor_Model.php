<?php

class Supervisor_Model extends Model
{
    function __construct()
    {
        parent::__construct();
    }


    function getTeaCollection()
    {
        $date = date("Y-m-d");
        // $date = '2021-10-29';
        $query = "SELECT lid, initial_weight_agent, agent_id FROM tea WHERE date='$date'";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function getTodayFertilizerRequest()
    {
        // $date = '2021-10-20';
        $date = date("Y-m-d");
        // echo $date;
        $query = "SELECT user.name, landowner.user_id, request.request_id, request.request_type, 
                DATE(request.request_date) AS request_date, fertilizer_request.amount 
                FROM user 
                INNER JOIN landowner 
                ON landowner.user_id=user.user_id 
                INNER JOIN request 
                ON request.lid=landowner.user_id
                INNER JOIN fertilizer_request 
                ON request.request_id=fertilizer_request.request_id
                WHERE DATE(request.request_date)='$date' AND request.response_status='receive'";
        $row = $this->db->runQuery($query);
        // print_r($row);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function getLastRequestDate($landowner_id)
    {
        $query = "SELECT DATE(request_date) As request_date FROM request 
                WHERE lid = '$landowner_id' 
                AND request_type = 'fertilizer' 
                AND response_status = 'accept'";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function getMonthTeaWeight($month, $landowner_id)
    {
        $monthlyTeaAmount = 0;
        $query = "SELECT * FROM tea WHERE MONTH(date) = '$month' AND lid='$landowner_id'";
        $row = $this->db->runQuery($query);

        if (count($row)) {
            for ($i = 0; $i < count($row); $i++) {
                $monthlyTeaAmount += $row[$i]['net_weight'];
            }
            return '<b>'.$monthlyTeaAmount / count($row) .'Kg for '. date('F', strtotime("2001-$month-1")) . '</b>';
        } else {
            return '<b style="color:red;">No data found for ' . date('F', strtotime("2001-$month-1")) . '</b>';
        }
    }

    function getTeaQuality($landowner_id)
    {
        $query = "SELECT quality FROM tea WHERE lid='$landowner_id'";
        $row = $this->db->runQuery($query);

        if (count($row)) {
            return $row;
        } else {
            false;
        }
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


    function isCollected($landowner_id)
    {
        $date = date("Y-m-d");
        $query = "SELECT * FROM tea WHERE lid='$landowner_id' AND date='$date'";
        $row = $this->db->runQuery($query);
        if (!empty($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function getLandownerId()
    {
        $date = date("Y-m-d");
        $query = "SELECT * FROM tea WHERE date='$date' AND sup_id IS NULL";
        $row = $this->db->runQuery($query);
        if (!empty($row)) {
            return $row;
        } else {
            return false;
        }
    }
    function updateTeaMeasure($data)
    {
        $landowner_id = $data['landowner_id'];
        $weight = $data['weight'];
        $water = $data['water'];
        $container = $data['container'];
        $mature_leaves = $data['mature_leaves'];
        $net_weight = $data['net_weight'];
        $supervisor_id = $_SESSION['user_id'];
        $rate = $data['rate'];
        $date = date('Y-m-d');

        $query = "UPDATE tea SET initial_weight_sup = $weight, water_percentage = $water, 
        container_percentage = $container, matured_percentage = $mature_leaves, 
        net_weight = $net_weight, sup_id = '$supervisor_id', quality = $rate 
        WHERE lid = '$landowner_id' AND date='$date'";
        $this->db->runQuery($query);
        return true;
    }


    function getUpdateTeaMeasure()
    {
        $date = date('Y-m-d');
        $supervisor_id = $_SESSION['user_id'];
        $query = "SELECT * FROM tea WHERE date='$date' AND sup_id='$supervisor_id'";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    function getUpdateTeaMeasureById($landowner_id)
    {
        $query = "SELECT * FROM tea WHERE lid='$landowner_id'";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
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
        $comment = $data['comment'];
        $query = "UPDATE request SET response_status='$response_status' WHERE request_id='$request_id'";

        if ($response_status == 'accept') {
            $message = "Your Request accepted, Agent will diliver your fertilizer amount.";
        } else if ($response_status == 'decline') {
            $message = "Your Request declined, For more details contact Supervisor " . $_SESSION['name'];
            if ($comment != '') {
                $message = "Your Request declined, " . $comment . " For more details contact Supervisor " . $_SESSION['name'];
            }
        }
        $notificationQuery = "INSERT INTO notification(read_unread, seen_not_seen, message, receiver_type, notification_type, sender_id)
        VALUES(0, 0, '$message', 'Landowner', 'request', '" . $_SESSION['user_id'] . "')";

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->db->beginTransaction();
            $this->db->runQuery($query);
            $this->db->runQuery($notificationQuery);
            $this->db->commit();
        } catch (PDOException $e) {
            $this->db->rollback();
            throw $e;
        }
    }

    function stock($data)
    {
        $type = $data['type'];
        if ($data['stock_type'] == 'out_stock') {
            $query = "SELECT DATE(out_date) 
                AS out_date, 
                out_quantity, emp_id 
                FROM " . $data['stock_type'] . " WHERE type='$type'";
        } else if ($data['stock_type'] == 'in_stock') {
            $query = "SELECT DATE(in_date) 
                AS in_date, 
                price_per_unit, price_for_amount, in_quantity, emp_id 
                FROM " . $data['stock_type'] . " WHERE type='$type'";
        }

        $row = $this->db->runQuery($query);
        if (!empty($row)) {
            return $row;
        } else {
            return false;
        }
    }

    //Manage Stock
    function manageStock($data)
    {
        $type = $data['type'];
        $amount = $data['amount'];
        $emp_id = $_SESSION['user_id'];
        $full_stock = null;

        $query = "SELECT * FROM stock WHERE type='$type'";
        $row = $this->db->runQuery($query);

        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        try {
            $this->db->beginTransaction();

            if (empty($row)) {
                $full_stock = 0;
                $query = "INSERT INTO stock(type, full_stock, emp_id) VALUES('$type', '$full_stock', '$emp_id')";
                $this->db->runQuery($query);
            } else {
                $full_stock = $row[0]['full_stock'];
            }

            if ($data['stock_type'] == 'in_stock') {
                $price_per_unit = $data['price_per_unit'];
                $price_for_amount = $price_per_unit * $amount;

                $full_stock += $amount;
                $query = "UPDATE stock SET full_stock='$full_stock', emp_id='$emp_id' WHERE type='$type'";
                $this->db->runQuery($query);

                $query = "INSERT INTO in_stock(type, price_per_unit, price_for_amount, in_quantity, emp_id) 
                        VALUES('$type', '$price_per_unit', '$price_for_amount' , '$amount', '$emp_id')";
                $this->db->runQuery($query);
            } else if ($data['stock_type'] == 'out_stock') {
                if ($full_stock) {
                    if ($full_stock < $amount) {
                        $amount = $full_stock;
                        $full_stock -= $full_stock;
                    } else {
                        $full_stock -= $amount;
                    }
                    if ($type == 'fertilizer') {
                        $_SESSION['fertilizer_stock'] = $full_stock;
                        if ($full_stock <= 500) {
                            $this->stockGetLimit("Fertilzer Stock", $full_stock);
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

                            $pusher->trigger('my-channel', 'Supervisor_notification', $data);
                            //-------------------------------------------//
                        }
                    } else if ($type == 'firewood') {
                        $_SESSION['firewood_stock'] = $full_stock;
                        if ($full_stock <= 500) {
                            $this->stockGetLimit("Firewood Stock", $full_stock);
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

                            $pusher->trigger('my-channel', 'Supervisor_notification', $data);
                            //-------------------------------------------//
                        }
                    }

                    $query = "UPDATE stock SET full_stock='$full_stock', emp_id='$emp_id' WHERE type='$type'";
                    $this->db->runQuery($query);
                }

                $query = "INSERT INTO out_stock(type, out_quantity, emp_id) VALUES('$type', '$amount', '$emp_id')";
                $this->db->runQuery($query);
            }
            $this->db->commit();
            return true;
        } catch (PDOException $e) {
            $this->db->rollback();
            throw $e;
            return false;
        }
    }

    //Insert Notification about stock limit
    function stockGetLimit($stock_type, $full_stock)
    {
        $message = $stock_type . " " . $full_stock . "kg. Please inform manager";
        $query = "INSERT INTO notification(read_unread, seen_not_seen, message, receiver_type, sender_id) 
        VALUES(0, 0, '$message', 'Supervisor', '" . $_SESSION['user_id'] . "')";
        $this->db->runQuery($query);
    }

    function searchByDate($data)
    {
        $stock_type = $data['stock_type'];
        $type = $data['type'];
        $search_date = $data['date'];

        $query = "SELECT DATE(in_date) 
                AS in_date, 
                type, price_per_unit, price_for_amount, in_quantity, emp_id 
                FROM '$stock_type' WHERE type='$type' WHERE in_date='$search_date'";

        $row = $this->db->runQuery($query);
        if (count($row)) {
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
            WHERE receiver_type='Supervisor' ORDER BY read_unread ASC, notification_id DESC";
        } else if ($notification_type == 'half') {
            $query = "SELECT * FROM notification 
            WHERE receiver_type='Supervisor' AND read_unread=0 ORDER BY notification_id DESC";
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
            WHERE receiver_type='Supervisor' ORDER BY notification_id DESC";

        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        }
    }
    function getNotificationCount()
    {
        $query = "SELECT * FROM notification 
        WHERE receiver_type='Supervisor' AND seen_not_seen=0";
        $row = $this->db->runQuery($query);

        if (count($row)) {
            $_SESSION['NotSeenCount'] = count($row);
            if (isset($_GET['getCount']))
                echo $_SESSION['NotSeenCount'];
        } else {
            $_SESSION['NotSeenCount'] = 0;
        }
    }
}

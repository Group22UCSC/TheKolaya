<?php

class Manager_Model extends Model
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

    //Create Account
    function searchUserContact($contact_number)
    {
        $query = "SELECT * FROM user WHERE contact_number='$contact_number'";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row[0]['contact_number'];
        } else {
            return false;
        }
    }

    function searchUserId($user_id)
    {
        $query = "SELECT * FROM user WHERE user_id='$user_id'";
        $row = $this->db->runQuery($query);
        if ($row) {
            return $row[0]['user_id'];
        } else {
            return false;
        }
    }

    function availableListTable_landowners()
    {
        $query = "SELECT * FROM user WHERE user_type='Land_Owner' AND verify=1";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function viewProduct_instock()
    {
        $query = "SELECT * FROM products_in";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }


    function view_payments_table()
    {
        $query = "SELECT monthly_payment.Date, 
       monthly_payment.year,
       monthly_payment.month, 
       monthly_payment.fertilizer_expenses,
       monthly_payment.advance_expenses, 
       monthly_payment.income, 
       monthly_payment.final_payment, 
       monthly_payment.emp_id,  
       monthly_payment.lid ,
       user.user_id, 
       user.name
       FROM monthly_payment
       INNER JOIN user ON monthly_payment.lid = user.user_id";

        // $query = "SELECT * FROM monthly_payment";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }


    function view_instock()
    {
        $query = "SELECT * FROM in_stock";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function view_outstock()
    {
        $query = "SELECT * FROM out_stock";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function availableListTable()
    {
        $query = "SELECT *FROM user WHERE verify=1";
        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    // tea quality table
    function teaQualityTable()
    {
        $query = "SELECT landowner.user_id, 
        landowner.landowner_type,user.user_id, 
       user.name
       FROM landowner
       INNER JOIN user ON landowner.user_id = user.user_id";

        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
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


    function getStock2()
    {
        $query = "SELECT * FROM product";
        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        } else {
            return false;
        }
    }

    // emergency 
    function storeEmergencyMessage($data = [])
    {
        // $message = $data['message'];
        $message = "You are assigned to route number " .  $data['route_number'];
        $sender_id = $data['user_id'];
       

        $query = "INSERT INTO notification( read_unread, seen_not_seen, message,
         receiver_type, notification_type,sender_id) VALUES
         ('0','0','$message','Agent','emergency','$sender_id')";
        //have not added receiver_id and receive_datetime,Check into that.
        $this->db->runQuery($query);
        //add the query to make the agent unavailable  
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

                            $pusher->trigger('my-channel', 'Agent_notification', $data);
                            //-------------------------------------------//       
    }

    function emergencyTable()
    {
        $query = "SELECT agent.emp_id, 
       agent.route_no,
       agent.availability,
       user.user_id, 
       user.name
       FROM agent
       INNER JOIN user ON agent.emp_id = user.user_id WHERE availability=1 AND is_rejected=-1";

        $row = $this->db->runQuery($query);

        if ($row) {
            return $row;
        } else {
            return false;
        }
    }

    function buyerTable()
    {
        $query = "SELECT * FROM buyer ";
        $row = $this->db->runQuery($query);

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
            WHERE receiver_type='Manager' ORDER BY read_unread ASC, notification_id DESC";
        } else if ($notification_type == 'half') {
            $query = "SELECT * FROM notification 
            WHERE receiver_type='Manager' AND read_unread=0 ORDER BY notification_id DESC";
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
            WHERE receiver_type='Manager' ORDER BY notification_id DESC";

        $row = $this->db->runQuery($query);
        if (count($row)) {
            return $row;
        }
    }
    function getNotificationCount()
    {
        $query = "SELECT * FROM notification 
        WHERE receiver_type='Manager' AND seen_not_seen=0";
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

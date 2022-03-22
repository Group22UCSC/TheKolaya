<?php

class Admin extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->showPage('admin/admin');
    }

    public function viewAccount()
    {
        // $this->view->showPage('Manager/viewAccount');
        $result = $this->model->availablelistTable();
        // print_r($result);
        $this->view->render('admin/viewAccount', $result);
    }

    public function viewAccount1()
    {
        $this->view->showPage('admin/viewAccount1');
    }

    public function updateAccount()
    {
        
        $result = $this->model->availablelistTable();
        // $this->view->render('admin/updateAccount', $result);


           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'reg_id' => trim($_POST['user_id']),
                'reg_type' => trim($_POST['user_type']),
                'address' => trim($_POST['address']),
                'mobile_number' => trim($_POST['contact_number']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),

                'password_err' => '',
                'confirm_password_err' => '',
                'name_err' => '',
                
            ];

            if ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "confirmation not matching";
            }

            if (!preg_match ("/[^A-Za-z0-9_-\s]/", $data['name']) ) {  
                $data['name_err'] = "Only alphabets are allowed";     
            }

             
             // if (strlen($data['password']) < 6) {
             //        $data['password_err'] = "Please enter at least 6 characters";
             //    }


            if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$data['password'])) {
                    $data['password_err'] = "Please enter strong password";
            }

            if (empty($data['password_err']) && empty($data['confirm_password_err']) && empty($data['name_err'])) {
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                if($this->model->userUpdate($data)){
                    $result = $this->model->availablelistTable();
                    $this->view->render('admin/updateAccount',$result, $data);
                }
            }else {
                $this->view->render('admin/updateAccount',$result, $data);
            }
        } else {
            $data = [
                'name' => '',
                'reg_id' => '',
                'reg_type' => '',
                'address' => '',
                'mobile_number' => '',
                // 'route_number' => '',
                'password' => '',
                'confirm_password' => '',


                'contact_number_err' => '',
                'confirm_password_err' => '',
                'name_err' => ''
            ];
            $this->view->render('admin/updateAccount', $result, $data);
        }
    }



// delete account

 public $data = [
        'name' => '',
        'reg_id' => '',
        'reg_type' => '',
        'address' => '',
        'mobile_number' => '',
        'route_number' => '',
        'password' => '',
        'confirm_password' => '',

        'confirm_password_err' => '',
        'reg_id_err' => '',
        'mobile_number_err' => '',
    ];


  public function deleteAccount()
    {
        
        $result = $this->model->deleteTable();
        $this->view->render('admin/deleteAccount', $result);


           if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
             $this->data['name'] = trim($_POST['name']);
            $this->data['reg_id'] = trim($_POST['user_id']);
            $this->data['mobile_number'] = trim($_POST['contact_number']);

                $this->model->userDelete($this->data);
                // $this->view->render('admin/deleteAccount', $data);

        } else {
            $data = [
                 'name' => '',
                'reg_id' => '',
                'reg_type' => '',
                'address' => '',
                'mobile_number' => '',
                'route_number' => '',
                'password' => '',

                 'contact_number_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view->render('admin/deleteTable', $data);
        }

    }
    

    public function admin()
    {
        $this->view->showPage('admin/Admin');
    }

    public function setTeaPrice()
    {
        $this->view->showPage('admin/setteaprice');
    }

    //Create Accounts

    public function createAccountSelect()
    {
        $this->view->showPage('admin/createAccountSelect');
    }

  
    public $user_data = [
        'name' => '',
        'reg_id' => '',
        'reg_type' => '',
        'address' => '',
        'mobile_number' => '',
        'route_number' => '',
        'password' => '',
        'confirm_password' => '',

        'confirm_password_err' => '',
        'reg_id_err' => '',
        'mobile_number_err' => '',
        'name_err' => '',
    ];

    public function create_account()
    {

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->user_data['name'] = join("" ,explode(" " , trim($_POST['name'])));
            $this->user_data['reg_id'] = trim($_POST['user_id']);
            $this->user_data['mobile_number'] = trim($_POST['contact_number']);
            $this->user_data['reg_type'] = trim($_POST['user_type']);

             
            if (preg_match("/^[A-Za-z]/", $this->user_data['name']) ) {  
                $this->user_data['name_err'] = "Please enter valid name";     
            }  

            $account_type = $_SESSION['account_type'];

            if ($account_type == 'full') {
                $this->user_data['password'] = trim($_POST['password']);
                $this->user_data['confirm_password'] = trim($_POST['confirm_password']);
                $this->user_data['address'] = trim($_POST['address']);
                if ($this->user_data['reg_type'] == 'Agent' || $this->user_data['reg_type'] == 'direct_landowner' || $this->user_data['reg_type'] == 'indirect_landowner') {
                    $this->user_data['route_number'] = trim($_POST['route_number']);
                }
            } else {
                if ($this->user_data['reg_type'] == 'Agent' || $this->user_data['reg_type'] == 'direct_landowner' || $this->user_data['reg_type'] == 'indirect_landowner') {
                    $this->user_data['route_number'] = trim($_POST['route_number']);
                }
            }
            if ($this->user_data['password'] != $this->user_data['confirm_password']) {
                $this->user_data['confirm_password_err'] = "confirmation not matching";
            }
            if ($this->model->searchUserContact($this->user_data['mobile_number'])) {
                $this->user_data['mobile_number_err'] = "This mobile number is already Taken";
            }
            if ($this->model->searchUserId($this->user_data['reg_id'])) {
                $this->user_data['user_id_err'] = "This user_id is already Taken";
            }
            // if ($account_type == 'full') {
            //     if (strlen($this->user_data['password']) < 6) {
            //         $this->user_data['password_err'] = "Please enter at least 6 characters";
            //     }
            // }

             if ($account_type == 'full') {
                 if (!preg_match("#.*^(?=.{8,20})(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W).*$#",$this->user_data['password'])) {
                    $this->user_data['password_err'] = "Please enter strong password";
                }
            }

            if (empty($this->user_data['mobile_number_err']) && empty($this->user_data['confirm_password_err']) && empty($this->user_data['user_id_err']) && empty($this->user_data['name_err']) && empty($this->user_data['password_err'])) {
                if ($account_type == 'full') {
                    $this->user_data['password'] = password_hash($this->user_data['password'], PASSWORD_DEFAULT);

                    $this->model->userRegistration($this->user_data);
                    $this->createAccount();
                } elseif ($account_type == 'temp') {
                    $this->model->userRegistration($this->user_data);
                    // if ($account_type == 'temp') {
                    //     $contact_number = $this->user_data['mobile_number'];
                    //     $user = "94701826475";
                    //     $password = "7027";
                    //     $text = urlencode("Your තේ කොළය user id is: " . $this->user_data['reg_id']. ". Registered Mobile Number is: ". $contact_number .". Register from Here".URL."/registration");
                    //     $text = urlencode("Your තේ කොළය user id is: " . $this->user_data['reg_id']. ". Registered Mobile Number is: ". $contact_number);
                    //     $to = "$contact_number";

                    //     $baseurl = "http://www.textit.biz/sendmsg";
                    //     $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
                    //     $ret = file($url);

                    //     $res = explode(":", $ret[0]);
                    // }
                    $this->createTempAccount();
                }
            } else {
                if ($account_type == 'full') {
                    $this->createAccount();
                } else {
                    $this->createTempAccount();
                }
            }
        } else {
            $this->createAccount();
        }
    }


    public function createAccount()
    {
        $data = $this->model->checkTable();
        $this->view->show('admin/fullAccount/create_account', $data, $this->user_data);
    }


    public function createTempAccount()
    {
        $data = $this->model->checkTable();
        $this->view->show('admin/tempAccount/create_tempAccount', $data, $this->user_data);
    }

    //Manage Profile
    function profile()
    {
        $this->view->render('user/profile/profile');
    }

    function editProfile()
    {
        include '../app/controllers/User.php';
        $user = new User();
        $user->loadModelUser('user');
        $user->editProfile();
    }

    function enterPassword()
    {
        $this->view->render('user/profile/enterPassword');
    }




      public $buyer = [
        'name' => '',
        'reg_id' => '',

        'mobile_number' => '',

        'password' => '',
        'confirm_password' => '',

        'confirm_password_err' => '',
        'reg_id_err' => '',
        'mobile_number_err' => '',
    ];
     public function addbuyer()
    {
        $result = $this->model->buyerTable();
        $this->view->render('admin/addbuyer', $result);

         if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->buyer['reg_id'] = trim($_POST['buyer_id']);
            $this->buyer['name'] = trim($_POST['name']);
            $this->buyer['mobile_number'] = trim($_POST['contact_no']);

             $this->model->buyerRegistration($this->buyer);
           }


    }
}

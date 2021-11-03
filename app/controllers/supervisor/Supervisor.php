<?php

class Supervisor extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $stock = $this->model->getStock();
        $teaCollection = $this->model->getTeaCollection();
        $todayRequests = $this->model->getTodayFertilizerRequest();

        $this->view->render('Supervisor/Supervisor', $stock, $teaCollection, $todayRequests);
    }

    function updateTeaMeasure()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'landowner_id' => $_POST['landowner_id'],
                'weight' => $_POST['weight'],
                'water' => $_POST['water'],
                'mature_leaves' => $_POST['mature_leaves'],
                'container' => $_POST['container'],

                'net_weight' => '',
                'rate' => $_POST['rate']
            ];
            $reduction = ($data['weight'] * ($data['water'] + $data['container'] + $data['mature_leaves'])) / 100;
            $data['net_weight'] = $data['weight'] - $reduction;
            $data['rate'] = ($data['rate']) * 20;

            $this->model->updateTeaMeasure($data);
            $updateTable = $this->model->getUpdateTeaMeasure();
            if (!empty($updateTable)) {
                echo '<div class="row tabel-header">
                      <div class="cell">Landowner ID</div>
                      <div class="cell">Reductions(kg)</div>
                      <div class="cell">Net-Weight(kg)</div>
                      <div class="cell">Tea Quality</div>
                    </div>';
                $countData = count($updateTable) - 1;
                if($updateTable[$countData]['quality'] <= 20) {
                    $teaQuality = 'Too Bad';
                }else if($updateTable[$countData]['quality'] > 20 && $updateTable[$countData]['quality'] <= 40) {
                    $teaQuality = 'Bad';
                }else if($updateTable[$countData]['quality'] > 40 && $updateTable[$countData]['quality'] <= 60) {
                    $teaQuality = 'Average';
                }else if($updateTable[$countData]['quality'] > 60 && $updateTable[$countData]['quality'] <= 80) {
                    $teaQuality = 'Good';
                }else if($updateTable[$countData]['quality'] > 80 && $updateTable[$countData]['quality'] <= 100) {
                    $teaQuality = 'Excellent';
                }
                $reductions = $updateTable[$countData]['water_precentage'] + $updateTable[$countData]['container_precentage'] + $updateTable[$countData]['matured_precentage'];
                echo '<div class="row">
                          <div class="cell" data-title="Landowener Id">' . $updateTable[$countData]['lid'] . '</div>
                          <div class="cell" data-title="Reductions(kg)">' . $reductions . '</div>
                          <div class="cell" data-title="Net-Weight(kg)">5' . $updateTable[$countData]['net_weight'] . '</div>
                          <div class="cell" data-title="Tea Quality">'. $teaQuality .'</div>
                        </div>';
            }
        } else {
            $updateTable = $this->model->getUpdateTeaMeasure();
            $this->view->render('Supervisor/updateTeaMeasure', $updateTable);
        }
    }

    function manageRequests()
    {
        $request = $this->model->manageRequests();
        $this->view->render('Supervisor/manageRequests', $request);
    }

    function manageFertilizer()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'stock_type' => $_POST['stock_type'],
                'type' => $_POST['type'],
                'price_per_unit' => '',
                'amount' => trim($_POST['amount'])
            ];
            if ($_POST['stock_type'] == 'in_stock') {
                $data['price_per_unit'] = trim($_POST['price_per_unit']);
            }

            $this->model->manageStock($data);
        } else {
            $this->view->render('Supervisor/manageFertilizer');
        }
    }

    function manageFirewood()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'stock_type' => $_POST['stock_type'],
                'type' => $_POST['type'],
                'price_per_unit' => '',
                'amount' => trim($_POST['amount'])
            ];
            if ($_POST['stock_type'] == 'in_stock') {
                $data['price_per_unit'] = trim($_POST['price_per_unit']);
            }

            $this->model->manageStock($data);
        } else {
            $this->view->render('Supervisor/manageFirewood');
        }
    }

    function fertilizerInStock()
    {
        $data = [
            'stock_type' => 'in_stock',
            'type' => 'fertilizer',
        ];
        $_SESSION['search'] = 0;
        if (isset($_GET['search_btn'])) {
            $_SESSION['searchDate'] = trim($_GET['date']);
            $_SESSION['search'] = 1;
        }
        $instock = $this->model->stock($data);
        $this->view->render('Supervisor/fertilizerInStock', $instock);
    }

    function firewoodInStock()
    {
        $data = [
            'stock_type' => 'in_stock',
            'type' => 'firewood',
            'date' => ''
        ];
        $instock = $this->model->stock($data);
        $this->view->show('Supervisor/firewoodInStock', $instock);
    }

    function fertilizerOutStock()
    {
        $this->view->render('Supervisor/fertilizerOutstock');
    }

    function firewoodOutStock()
    {
        $data = [
            'stock_type' => 'out_stock',
            'type' => 'firewood',
        ];
        $outstock = $this->model->stock($data);
        $this->view->render('Supervisor/firewoodOutStock', $outstock);
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
}

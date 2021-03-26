<?php

class Orders extends Controller
{

    public function __construct()
    {
        $this->orderModel = $this->model('Order');
    }

    public function index()
    {
        if (!empty($_SESSION['user_id'])) {
            $user_id = trim($_SESSION['user_id']);
            $data = $this->orderModel->getUserOrders($user_id);

            if (!empty($data)) {
                $this->view('orders/index', $data);
            } else {
                $data = [
                    "no_orders" => 'Vous n\'avez pas encore de commandes... :('
                ];

                $this->view('orders/index', $data);
            }
        } else {
            $data = [
                "not_connected" => 'Vous devez vous <a href="' . URLROOT . '/users/login">connecter</a> pour voir vos commandes !'
            ];
            $this->view('orders/index', $data);
        }
    }
}

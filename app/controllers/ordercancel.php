<?php

class ordercancel extends Controller
{
    public function index()
    {
        $CheckoutModel = new CheckoutModel();
        $userId = $_SESSION['USER_DATA']->id; // Get the user ID from the session
        $orderId = $_GET['orderId']; // Get the order ID from the query parameters
        $orderStatus = $CheckoutModel->getOrderStatus($userId, $orderId);
        $reason = $CheckoutModel->getreason($orderId);
        $data['reason'] = $reason;
        $data['orderId'] = $orderId;
        $data['orderStatus'] = $orderStatus;
        $data['title'] = "Ordercancel";
        $this->view('customer/ordercancel', $data);
    }
}

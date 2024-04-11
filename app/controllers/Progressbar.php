<?php

class Progressbar extends Controller
{
    public function index()
    {
        $CheckoutModel = new CheckoutModel();
        $userId = $_SESSION['USER_DATA']->id; // Get the user ID from the session
        $orderStatus = $CheckoutModel->getLastOrderStatus($userId);
        $orderId = $CheckoutModel->getLastOrderId($userId);
        $data['title'] = "Progressbar";
        $data['orderStatus'] = $orderStatus;
        $data['orderId'] = $orderId;
        $this->view('customer/progressbar', $data);
    }
}

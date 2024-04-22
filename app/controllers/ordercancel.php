<?php

class ordercancel extends Controller
{
    public function index()
    {
        $checkoutModel = new CheckoutModel();
        $userId = $_SESSION['USER_DATA']->id; // Get the user ID from the session
        $orderid = $checkoutModel->getLastOrderId($userId);
        $reason = $checkoutModel->getreason($orderid);
        $data['reason'] = $reason;
        $data['orderid'] = $orderid;
        $data['title'] = "Ordercancel";
        $this->view('customer/ordercancel', $data);
    }
}

<?php

class Progressbar extends Controller
{
    public function index()
    {
        $CheckoutModel = new CheckoutModel();
        $orderStatus = $CheckoutModel->getLastOrderStatus();
        $orderId = $CheckoutModel->getLastOrderId();
        $data['title'] = "Progressbar";
        $data['orderStatus'] = $orderStatus;
        $data['orderId'] = $orderId;
        $this->view('customer/progressbar', $data);
    }
}

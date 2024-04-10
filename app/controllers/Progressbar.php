<?php

class Progressbar extends Controller
{
    public function index()
    {
        $CheckoutModel = new CheckoutModel();
        $orderStatus = $CheckoutModel->getLastOrderStatus();

        $data['title'] = "Progressbar";
        $data['orderStatus'] = $orderStatus;
        $this->view('customer/progressbar', $data);
    }
}
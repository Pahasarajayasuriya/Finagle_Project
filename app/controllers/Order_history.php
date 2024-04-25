<?php

class Order_history extends Controller
{
    public function index()
    {
        $details = new CheckoutModel();
        $id = $id ?? Auth::getId();

        $data['details'] = $details->getCheckoutDataByUserId($id);
        if (empty($data['details'])) {
            header('Location: ' . ROOT . '/Noorders');
            exit;
        }
        $data['title'] = "Order_history";
        $this->view('customer/order_history', $data);
    }
}

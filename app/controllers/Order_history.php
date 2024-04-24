<?php

class Order_history extends Controller
{
    public function index()
    {
        $details = new CheckoutModel();
        $id = $id ?? Auth::getId();

        $data['details'] = $details->getCheckoutDataByUserId($id);
        $data['title'] = "Order_history";
        $this->view('customer/order_history', $data);
    }
}

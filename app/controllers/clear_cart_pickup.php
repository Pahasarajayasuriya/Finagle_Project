<?php
class clear_cart_pickup extends Controller
{
    public function index()
    {
        $data['title'] = "Clear_cart_pickup";
        $this->view('customer/clear_cart_pickup', $data);
    }
}

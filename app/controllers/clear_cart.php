<?php
class clear_cart extends Controller
{
    public function index()
    {
        $data['title'] = "Clear_cart";
        $this->view('customer/clear_cart', $data);
    }
}

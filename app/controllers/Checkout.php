<?php

class Checkout extends Controller
{
    public function index()
    {
        $data['title'] = "Checkout";
        $this->view('customer/checkout', $data);
    }
}

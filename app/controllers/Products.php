<?php

class Products extends Controller
{
    public function index()
    {
        $data['title'] = "Products";
        $this->view('customer/products', $data);
    }
}

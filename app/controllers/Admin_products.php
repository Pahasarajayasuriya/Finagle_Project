<?php

class Admin_products extends Controller
{
    public function index()
    {
        $data['title'] = "Products";
        $this->view('admin/admin_products', $data);
    }
}

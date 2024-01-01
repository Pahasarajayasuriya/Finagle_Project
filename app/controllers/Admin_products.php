<?php

class Admin_products extends Controller
{
    public function index()
    {
        $data['title'] = "Admin";
        $this->view('admin/admin_products', $data);
    }

}

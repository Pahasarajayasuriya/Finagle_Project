<?php

class Admin_dashboard extends Controller
{
    public function index()
    {
        $data['title'] = "admin_dashboard";
        $this->view('admin/admin_dashboard', $data);
    }
}
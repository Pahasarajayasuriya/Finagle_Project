<?php

class Admin_branch extends Controller
{
    public function index()
    {
        $data['title'] = "admin_branch";
        $this->view('admin/admin_branch', $data);
    }
}
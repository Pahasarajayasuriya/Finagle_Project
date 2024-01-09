<?php

class Admin_branches extends Controller
{
    public function index()
    {
        $data['title'] = "admin_branch";
        $this->view('admin/admin_branches', $data);
    }
}
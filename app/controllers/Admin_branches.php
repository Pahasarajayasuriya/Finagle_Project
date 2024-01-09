<?php

class Admin_branches extends Controller
{
    public function index()
    {

        $admin_branches = new admin_branchesModel();
        $data['rows'] = $admin_branches->get_all();
        // show($data);
        $data['errors'] = [];


        $data['title'] = "admin_branch";
        $this->view('admin/admin_branches', $data);
    }
}
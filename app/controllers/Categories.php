<?php

class Categories extends Controller
{
    public function index()
    {
        $data['title'] = "Categories";
        $this->view('admin/categories', $data);
    }
}

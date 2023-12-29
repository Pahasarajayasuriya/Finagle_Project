<?php

class Complaint extends Controller
{
    public function index()
    {
        $data['title'] = "Complaint";
        $this->view('customer/complaint', $data);
    }
}

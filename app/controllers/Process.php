<?php

class Process extends Controller
{
    public function index()
    {
        $data['title'] = "Process";
        $this->view('customer/process', $data);
    }
}

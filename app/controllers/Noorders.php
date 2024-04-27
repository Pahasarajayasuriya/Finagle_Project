<?php

class Noorders extends Controller
{
    public function index()
    {
        $data['title'] = "Noorders";
        $this->view('customer/noorders', $data);
    }
}

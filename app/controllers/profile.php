<?php

class profile extends Controller
{
    public function index()
    {
        $data['title'] = "Profile";
        $this->view('deliverer/profile', $data);
    }
}
<?php

class Assign extends Controller
{
    public function index()
    {
        $data['title'] = "Assign";
        $this->view('deliverer/assign', $data);
    }
}

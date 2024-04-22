<?php

class Manager_deliverer extends Controller
{
    public function index()
    {
        $customerModel = new Deliverers();
        $data['driver'] = $customerModel->getdeliverers();

        $this->view('manager/deliverers', $data);
       
    }
}
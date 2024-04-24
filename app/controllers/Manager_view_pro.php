<?php

class Manager_view_pro extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['rows'] = $productModel->all();
        $this->view('manager/manager_view_pro', $data);
    }

}

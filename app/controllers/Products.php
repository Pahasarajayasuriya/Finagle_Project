<?php

class Products extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->all();
        // echo '<pre>';
        // print_r($data['products']);
        // echo '</pre>';
        $data['title'] = "Products";
        $this->view('customer/products', $data);
    }
}

<?php

class Products extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->all();

        // var_dump($data['products']);

        $data['title'] = "Products";
        $this->view('customer/products', $data);
    }
}

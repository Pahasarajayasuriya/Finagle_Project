<?php

class Products extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['products'] = $productModel->all();
        $categories = ['Bread & Buns', 'Cakes', 'Frozen Foods'];
        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category] = array_filter($data['products'], function ($product) use ($category) {
                return $product->category === $category;
            });
        }
        $data['categories'] = $categories;
        $data['productsByCategory'] = $productsByCategory;
        $data['title'] = "Products";
        $this->view('customer/products', $data);
    }
}
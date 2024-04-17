<?php

class Products extends Controller
{
    public function index()
    {
        $productModel = new ProductModel();
        $data['products'] = $allproducts = $productModel->all();
        $data['weights'] = [
            'Bread & Buns' => 2,
            'Cakes' => 10,
            'Frozen Foods' => 2,
        ];
        $categories = ['Bread & Buns', 'Cakes', 'Frozen Foods'];
        $productsByCategory = [];
        foreach ($categories as $category) {
            $productsByCategory[$category] = array_filter($allproducts, function ($product) use ($category) {
                return $product->category === $category;
            });
        }
        $data['categories'] = $categories;
        $data['productsByCategory'] = $productsByCategory;
        $data['title'] = "Products";
        $this->view('customer/products', $data);
    }
}

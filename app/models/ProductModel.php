<?php

class ProductModel extends Model
{
    protected $table = "products";
    protected $allowedColumns = [
        'name',
        'category',
        'price',
        'image',
    ];

    public function getProducts()
    {
        return $this->all();
    }
}

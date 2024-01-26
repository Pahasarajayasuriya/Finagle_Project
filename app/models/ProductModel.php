<?php

class ProductModel extends Model
{
    protected $table = "products";
    protected $allowedColumns = [
        'user_name',
        'description',
        'category',
        'price',
        'quantity',
        'image',
        'date',
        'slug',
    ];

    public function getProducts()
    {
        return $this->all();
    }
}

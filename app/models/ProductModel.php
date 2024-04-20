<?php
/*
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
*/


class ProductModel extends Model
{
    public $table = "products";

    public function getProducts()
    {
        return $this->all();
    }
}
?>
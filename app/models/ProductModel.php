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

    public function updateQuantity($productId, $quantity)
    {
        $query = "UPDATE `" . $this->table . "` SET quantity = ? WHERE id = ?";
        $result = $this->query($query, [$quantity, $productId]);

        return $result !== false;
    }
}

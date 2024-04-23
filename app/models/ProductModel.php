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

    public function find($id)
    {
        $query = "SELECT * FROM `" . $this->table . "` WHERE `id` = :id LIMIT 1";
        $result = $this->query($query, ['id' => $id]);

        if ($result) {
            return $result[0];
        }

        return false;
    }

    public function getLastProducts()
    {
        $query = "SELECT * FROM `" . $this->table . "` ORDER BY `id` DESC LIMIT 6";
        return $this->query($query);
    }

}

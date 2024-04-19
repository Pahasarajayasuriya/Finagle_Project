<?php

class Admin_productsModel extends Model
{
    public $table = "products";
    public $errors = [];
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

    public function validate($data)
    {
        return $data;
    }

    public function all()
    {
        $query = "SELECT * FROM {$this->table}";
        return $this->query($query);
    }

    public function insertComplaint($data)
    {
        $validatedData = $this->validate($data);

        if (!$validatedData) {
            return false; // Return false if validation fails
        }

        return $this->insert($validatedData);
    }
}

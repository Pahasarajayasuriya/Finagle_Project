<?php

class Admin_productsModel extends Model
{
    public $table = "products";
    public $errors = [];
    protected $allowedColumns = [
        'name',
        'category',
        'price',
        'quantity',
        'image',
    ];

    public function validate($data)
    {
        // Add your validation logic here
        // You can customize the validation rules based on your requirements

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

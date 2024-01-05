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

        // Example: Check if required fields are present
        // if (empty($data['description']) || empty($data['category']) || empty($data['price'])) {
        //     $this->errors['general'] = "Please fill in all required fields.";
        //     return false;
        // }
        // var_dump($data);
        // You can add more validation rules as needed

        return $data;
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

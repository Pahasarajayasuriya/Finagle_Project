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
        'description',
        'id',

    ];

    public function validate($data)
    {
        $this->errors=[];

        if(empty($data['user_name']))
        {
            $this->errors['username']='Username is required'; 
        }

        if(empty($data['description']))
        {
            $this->errors['description']='Description is required'; 
        }

        if (empty($data['price'])) {
            $this->errors['price'] = 'Price is required';
        } elseif ($data['price'] <= 0) {
            $this->errors['price'] = 'Price must be greater than zero';
        }

        if(empty($this->errors))
        {
            return $data;
        }
        return false;

        //return $data;
    }


    public function get_all()
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

    public function del_product($id)
    {
        $query="DELETE FROM `products` WHERE `products`.`id` = ".$id;
        $this->query($query);
    }

    public function get_count()
    {
        $query = "SELECT COUNT(*) AS row_count FROM {$this->table}";
        $result = $this->query($query);
        return $result[0]->row_count;
    }

}

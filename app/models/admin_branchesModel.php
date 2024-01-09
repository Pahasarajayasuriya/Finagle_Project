<?php

class admin_branchesModel extends Model
{
    public $table = "branches";
    public $errors = [];
    protected $allowedColumns = [
        'id',
        'name',
        'addresss',
    ];

    public function validate($data)
    {
        // Add your validation logic here
        // You can customize the validation rules based on your requirements

        return $data;
    }

    public function get_all()
    {
        $query = "SELECT * FROM {$this->table}";
        return $this->query($query);
    }
}
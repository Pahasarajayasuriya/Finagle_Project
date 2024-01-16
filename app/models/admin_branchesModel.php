<?php

class admin_branchesModel extends Model
{
    public $table = "branch";
    public $errors = [];
    protected $allowedColumns = [
        'id',
        'name',
        'address',
        'contact_number',
        'open_time',
        'close_time',
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

    public function del_branch($id)
    {
        $query="DELETE FROM `branch` WHERE `branch`.`id` = ".$id;
        $this->query($query);
    }
}
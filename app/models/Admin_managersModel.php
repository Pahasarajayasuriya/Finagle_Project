<?php

class admin_managersModel extends Model
{
    public $table = "users";
    public $errors = [];
    protected $allowedColumns = [
        'id',
        'username',
        'image',
        'email',
        'password',
        'teleno',
        'role',
        'address',
    ];

    public function validate($data)
    {
        //There are more validation parts to be created
        // $this->errors=[];

        // if(empty($data['name']))
        // {
        //     $this->errors['name']='Branch name is required'; 
        // }

        // if(empty($data['address']))
        // {
        //     $this->errors['address']='Address is required'; 
        // }

        // if(empty($data['tellno']))
        // {
        //     $this->errors['contact_number']='Contact number is required'; 
        // }

        // if(empty($this->errors))
        // {
        //     return true;
        // }
        // return false;

        return $data;
    }

    public function get_all()
    {
        $query = "SELECT * FROM {$this->table} WHERE role = 'manager'";
        return $this->query($query);
    }

    public function del_manager($id)
    {
        $query="DELETE FROM `users` WHERE `users`.`id` = ".$id;
        $this->query($query);
    }
}
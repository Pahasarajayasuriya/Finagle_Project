<?php

class admin_customersModel extends Model
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
        $this->errors=[];

        if(empty($data['username']))
        {
            $this->errors['username']='Useername is required'; 
        }

        if(empty($data['address']))
        {
            $this->errors['address']='Useername is required'; 
        }

        if(empty($data['teleno']))
        {
            $this->errors['teleno']='Contact number is required'; 
        }elseif (!preg_match('/^\d{10}$/', $data['teleno'])) {
            $this->errors['teleno'] = 'Invalid telephone number format';
        }

        if(empty($data['email']))
        {
            $this->errors['email']='Email is required'; 
        }elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = 'Invalid email format';
        }

        if(empty($this->errors))
        {
            return true;
        }
        return false;

        // return $data;
    }

    public function get_all()
    {
        $query = "SELECT * FROM {$this->table} WHERE role = 'customer'";
        return $this->query($query);
    }

    public function del_customer($id)
    {
        $query="DELETE FROM `users` WHERE `users`.`id` = ".$id;
        $this->query($query);
    }

    public function get_count()
    {
        $query = "SELECT COUNT(*) AS row_count FROM {$this->table} WHERE role = 'customer'";
        $result = $this->query($query);
        return $result[0]->row_count;
    }

    public function pagination($start_from, $limit)
    {
        $query = "SELECT * FROM `users` WHERE role = 'customer' LIMIT $start_from, $limit";
        return $this->query($query);
    }

    public function get_count_p()
    {
        $query = "SELECT COUNT(id) FROM `users` WHERE role = 'customer'";
        return $this->query($query);
    }

}
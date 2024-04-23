<?php

class manager_reportModel extends Model
{
    public $table = "checkout";
    public $errors = [];
    protected $allowedColumns = [
        'id',
        'name',
        'delivery_or_pickup',
        'payment_method',
        'is_gift',

    ];

    public function validate($data)
    {
        //There are more validation parts to be created
        $this->errors=[];

        if(empty($data['name']))
        {
            $this->errors['name']='User name is required'; 
        }

        if(empty($data['address']))
        {
            $this->errors['address']='Address is required'; 
        }

        if(empty($data['tellno']))
        {
            $this->errors['contact_number']='Contact number is required'; 
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
        $query = "SELECT * FROM {$this->table}";
        return $this->query($query);
    }

    public function get_all2()
    {
        $query = "SELECT * FROM `users` WHERE `role`='employee'";
        return $this->query($query);
    }

    // public function del_deliverer($id)
    // {
    //     $query="DELETE FROM `users` WHERE `users`.`id` = ".$id;
    //     $this->query($query);
    // }

    // public function get_count()
    // {
    //     $query = "SELECT COUNT(*) AS row_count FROM {$this->table} WHERE role = 'deliverer'";
    //     $result = $this->query($query);
    //     return $result[0]->row_count;
    // }
}
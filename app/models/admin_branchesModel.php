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
        //There are more validation parts to be created
        $this->errors=[];

        if(empty($data['name']))
        {
            $this->errors['name']='Branch name is required'; 
        }

        if(empty($data['address']))
        {
            $this->errors['address']='Address is required'; 
        }

        if(empty($data['contact_number']))
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

    public function del_branch($id)
    {
        $query="DELETE FROM `branch` WHERE `branch`.`id` = ".$id;
        $this->query($query);
    }
}
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
            $this->errors['name']='Name is required'; 
        }

        if(empty($data['address']))
        {
            $this->errors['address']='Address is required'; 
        }

        if(empty($data['open_time'])) {
            $this->errors['open_time'] = 'Open time is required'; 
        } elseif (!isValidTimeFormat($data['open_time'])) {
            $this->errors['open_time'] = 'Invalid open time format'; 
        }
        
        if(empty($data['close_time'])) {
            $this->errors['close_time'] = 'Close time is required'; 
        } elseif (!isValidTimeFormat($data['close_time'])) {
            $this->errors['close_time'] = 'Invalid close time format'; 
        }   

        if(empty($data['contact_number']))
        {
            $this->errors['contact_number']='Contact number is required'; 
        }elseif (!preg_match('/^\d{10}$/', $data['teleno'])) {
            $this->errors['contact_number'] = 'Invalid telephone number format';
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

    public function del_branch($name)
    {
        // $query="DELETE FROM `branch` WHERE `branch`.`name` = ".$name;
        // $this->query($query);
         // Escape the branch name to prevent SQL injection
        //$escaped_name = $this->escape_string($name);
    
        // Use single quotes around the branch name in the SQL query
        $query = "DELETE FROM `branch` WHERE `branch`.`name` = '$name'";
    
        // Execute the query
        $this->query($query);
    }

    public function get_count()
    {
        $query = "SELECT COUNT(*) AS row_count FROM {$this->table}";
        $result = $this->query($query);
        return $result[0]->row_count;
    }
    
}
<?php

class admin_advertisementsModel extends Model
{
    public $table = "advertisement";
    public $errors = [];
    protected $allowedColumns = [
        'id',
        'image',
        'description',
        'end_date',
    ];

    public function validate($data)
    {
        //There are more validation parts to be created
        $this->errors=[];

        if(empty($data['description']))
        {
            $this->errors['description']='Description is required'; 
        }

        // if(empty($data['image']))
        // {
        //     $this->errors['image']='Image is required'; 
        // }

    
        if (empty($data['end_date'])) {
            $this->errors['end_date'] = 'Date is required';
        } elseif (!strtotime($data['end_date'])) {
            $this->errors['end_date'] = 'Invalid date format';
        } elseif (strtotime($data['end_date']) < strtotime(date('Y-m-d'))) {
            $this->errors['end_date'] = 'Date cannot be in the past';
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

    public function del_advertisement($id)
    {
        //$query="DELETE FROM `advertisement` WHERE `advertisement`.`id` = ".$id;
        $query = "UPDATE `advertisement` SET `availability` = '0' WHERE `id` = '$id'";
        //show($query);
        $this->query($query);
    }

    public function pagination($start_from, $limit)
    {
        //$query = "SELECT * FROM `advertisement` LIMIT $start_from, $limit";
        $query = "SELECT * FROM `advertisement` WHERE availability = '1' LIMIT $start_from, $limit";
        return $this->query($query);
    }

    public function get_count()
    {
        $query = "SELECT COUNT(id) FROM `advertisement` WHERE availability = '1'";
        return $this->query($query);
    }

}
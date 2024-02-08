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
        // $this->errors=[];

        // if(empty($data['description']))
        // {
        //     $this->errors['description']='Description is required'; 
        // }

        // if(empty($data['image']))
        // {
        //     $this->errors['image']='Image is required'; 
        // }

        // if(empty($data['end_date']))
        // {
        //     $this->errors['end_date']='End date is required'; 
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
        $query = "SELECT * FROM {$this->table}";
        return $this->query($query);
    }

    public function del_advertisement($id)
    {
        $query="DELETE FROM `advertisement` WHERE `advertisement`.`id` = ".$id;
        show($query);
        $this->query($query);
    }
}
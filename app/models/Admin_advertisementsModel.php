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

    public function get_all()
    {
        $query = "SELECT * FROM {$this->table}";
        return $this->query($query);
    }

    public function del_advertisement($id)
    {
        $query = "DELETE FROM `advertisement` WHERE `advertisement`.`id` = " . $id;
        show($query);
        $this->query($query);
    }

    public function get_active_advertisements()
    {
        $currentDate = date('Y-m-d');
        $query = "SELECT * FROM {$this->table} WHERE end_date > '{$currentDate}'";
        return $this->query($query);
    }
}

<?php

class Branches extends Model
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




}

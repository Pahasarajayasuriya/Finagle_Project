<?php

class Employee extends Model
{
    public $table = "employee";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'branch',
        'email',
        'username',
        'password',
        'branch_id',
        
    ];
   



}

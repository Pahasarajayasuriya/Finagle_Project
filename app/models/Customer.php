<?php

class Customer extends Model
{
    public $table = "customer";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'name',
        'username',
        'email',
        'contact_number',
        'address',
        
   
    ];




}

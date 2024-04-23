<?php

class Deliverers extends Model
{
    public $table = "driver";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'name',
        'username',
        'password',
        'email',
        'contact_number',
        'branch',
        'DOB',
        'joined_date',
        'delivered_orders',
        'total_earnings',
        

   
    ];




}

<?php

class Orders extends Model
{
    public $table = "orders";
    public $errors = [];
    protected $allowedColumns = [

        'order_id',
        'username',
        'date_of_order',
        'status',
        
    ];
   



}

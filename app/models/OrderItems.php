<?php

class OrderItems extends Model
{
    public $table = "orderitems";
    public $errors = [];
    protected $allowedColumns = [

        
        'order_id',
        'product_id',
        'quantity',

   
    ];




}

<?php

class Order_Details extends Model
{
    public $table = "order_details";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'order_id',
        'product_id',
        'quantity',

   
    ];




}

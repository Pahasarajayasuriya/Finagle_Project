<?php

class CancelOrders extends Model
{
    public $table = "cancel_orders";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'order_id',
        'reason',

    ];




}

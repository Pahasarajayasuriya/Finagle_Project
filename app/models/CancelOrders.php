<?php

class CancelOrders extends Model
{
    public $table = "branch";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'order_id',
        'reason',

    ];




}

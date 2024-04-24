<?php

class CheckoutOrder extends Model
{
    public $table = "checkout";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'customer_id',
        'name',
        'email',
        'phone_number',
        'delivery_or_pickup',
        'delivery_address',
        'pickup_location',
        'delivery_date',
        'delivery_time',
        'is_gift',
        'note',
        'payment_method',
        'latitude',
        'longitude',
        'formatted_address',
        'order_status',
        'total_cost',
        'deliver_id'

        
    ];
   



}

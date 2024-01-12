<?php

class Products extends Model
{
    public $table = "products";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'username',
        'description',
        'category',
        'price',
        'quantity',
        'image',


    ];




}

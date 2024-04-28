<?php

class Goals extends Model
{
    public $table = "goals";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'branch_name',
        'orders',
        'customers',
        'revenues',
        'others'
    ];




}

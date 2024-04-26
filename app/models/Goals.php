<?php

class Goals extends Model
{
    public $table = "goals";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'branch_name',
        'orders',
        'revenue',
        'others'
    ];




}

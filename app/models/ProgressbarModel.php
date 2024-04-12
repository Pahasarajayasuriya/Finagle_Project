<?php

class ProgressbarModel extends Model
{
    protected $table = 'reviews';
    public $errors = [];
    protected $allowedColumns = [
        'userName',
        'review',
        'rating',
        'datetime',
    ];

}

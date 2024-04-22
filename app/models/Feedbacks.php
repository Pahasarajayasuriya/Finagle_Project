<?php

class Feedbacks extends Model
{
    public $table = "reviews";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'userName',
        'image',
        'rating',
        'review',
        'datetime',
        

   
    ];




}

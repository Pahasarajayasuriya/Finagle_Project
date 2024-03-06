<?php

class Feedbacks extends Model
{
    public $table = "feedbacks";
    public $errors = [];
    protected $allowedColumns = [

        'id',
        'name',
        'teleno',
        'email',
        'feedback',
        

   
    ];




}

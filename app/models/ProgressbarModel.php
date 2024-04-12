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

    public function getLatestReviews($limit = 3)
    {
        $query = "SELECT * FROM {$this->table} ORDER BY datetime DESC LIMIT {$limit}";
        return $this->query($query);
    }
}

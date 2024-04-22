<?php
class Deliverers extends Model
{
    public $table = "users";

    public function getdeliverers()
    {
        $result = $this->where(['role' => 'deliverer']);
        return $result;
    }
}
?>


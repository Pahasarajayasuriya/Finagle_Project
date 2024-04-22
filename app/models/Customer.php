<?php
class Customer extends Model
{
    public $table = "users";

    public function getCustomers()
    {
        $result = $this->where(['role' => 'customer']);
        return $result;
    }
}
?>
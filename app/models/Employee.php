<?php
class Employee extends Model
{
    public $table = "users";

    public function getEmployees()
    {
        $result = $this->where(['role' => 'employee']);
        return $result;
    }
}
?>
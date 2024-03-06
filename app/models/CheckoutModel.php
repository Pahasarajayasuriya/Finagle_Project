<?php

class CheckoutModel extends Model {
    public $table = "order";
    public $errors = [];
    protected $allowedColumns = [

        'user_id',
        'name',
        'email',
        'phone_number',
        'delevery_or_pickup',
        'delivery_address',
        'pickup_location',
        'delivery_date',
        'delivery_time',
        'is_gift',
        'note',
        'payment_method',
        'latitude',
        'longitude',
        'formatted_address',
        'order_status',
        'total_cost'
    ];
    public function validate($data)
    {
        $this->errors = [];

        if (empty($data['username'])) {
            $this->errors['username'] = "Username is required";
        }


        //check email
        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Email is not valid";
        } else 
        if ($this->where(['email' => $data['email']])) {
            $this->errors['email'] = "This email already exists";
        }


        if (empty($data['password'])) {
            $this->errors['password'] = "A password is required";
        }
        if ($data['repassword'] !== $data['password']) {
            $this->errors['password'] = "Password do not match";
        }
        if (empty($data['teleno'])) {
            $this->errors['teleno'] = "A telephone number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $data['teleno'])) {
            $this->errors['teleno'] = "Invalid phone number";
        }
        if (empty($this->errors)) {
            return true;
        }
        return false;
    }
}
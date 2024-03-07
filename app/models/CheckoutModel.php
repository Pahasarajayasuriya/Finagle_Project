<?php

class CheckoutModel extends Model
{
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

        if (empty($data['name'])) {
            $this->errors['name'] = "Name is required";
        }

        if (empty($data['email'])) {
            $this->errors['email'] = "Email is required";
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $this->errors['email'] = "Invalid email format";
        }

        if (empty($data['teleno'])) {
            $this->errors['teleno'] = "A telephone number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $data['teleno'])) {
            $this->errors['teleno'] = "Invalid phone number";
        }

        // if (empty($data['delivery-pickup'])) {
        //     $this->errors['delivery-pickup'] = "Please select Delivery or Pickup";
        // } elseif ($data['delivery-pickup'] === 'delivery') {
        //     if (empty($data['latitude']) || empty($data['longitude'])) {
        //         $this->errors['location'] = "Please select delivery location";
        //     }
        // } elseif ($data['delivery-pickup'] === 'pickup') {
        //     if (empty($data['pickupLocation'])) {
        //         $this->errors['pickupLocation'] = "Please select pickup location";
        //     }
        // }
        if (empty($data['date'])) {
            $this->errors['date'] = "Date is required";
        } elseif (strtotime($data['date']) < strtotime('today')) {
            $this->errors['date'] = "Date cannot be in the past";
        }

        // if (empty($data['time'])) {
        //     $this->errors['time'] = "Time is required";
        // } elseif (strtotime($data['time']) < strtotime('now') + 1800) {
        //     $this->errors['time'] = "Time must be at least 30 minutes ahead of the current time";
        // }

        // if (empty($data['gift'])) {
        //     $this->errors['gift'] = "Please select whether to send as a gift or not";
        // }

        if (empty($data['payment'])) {
            $this->errors['payment'] = "Please select a payment method";
        }

        if (empty($this->errors)) {
            return $data;
        }
        return false;
    }
}

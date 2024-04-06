<?php

class CheckoutModel extends Model
{
    public $table = "checkout";
    public $errors = [];
    protected $allowedColumns = [

        'customer_id',
        'name',
        'email',
        'phone_number',
        'delivery_or_pickup',
        'deliver_id',
        'delivery_address',
        'pickup_location',
        'order_time',
        'latitude',
        'longitude',
        'order_status',
        'delivery_date',
        'delivery_time',
        'total_cost',
        'is_gift',
        'payment_method',
        'note',
        'formatted_address'
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

        if (empty($data['phone_number'])) {
            $this->errors['phone_number'] = "A telephone number is required";
        } elseif (!preg_match('/^[0-9]{10}$/', $data['phone_number'])) {
            $this->errors['phone_number'] = "Invalid phone number";
        }

        // if (empty($data['delivery_or_pickup'])) {
        //     $this->errors['delivery_or_pickup'] = "Please select Delivery or Pickup";
        // } elseif ($data['delivery_or_pickup'] === 'delivery') {
        //     if (empty($data['latitude']) || empty($data['longitude'])) {
        //         $this->errors['location'] = "Please select delivery location";
        //     }
        // } elseif ($data['delivery_or_pickup'] === 'pickup') {
        //     if (empty($data['pickupLocation'])) {
        //         $this->errors['pickupLocation'] = "Please select pickup location";
        //     }
        // }
        if (empty($data['delivery_date'])) {
            $this->errors['delivery_date'] = "Date is required";
        } elseif (strtotime($data['delivery_date']) < strtotime('today')) {
            $this->errors['delivery_date'] = "Date cannot be in the past";
        }

        // if (empty($data['delivery_time'])) {
        //     $this->errors['delivery_time'] = "Time is required";
        // } elseif (strtotime($data['delivery_time']) > strtotime('now') + 1800) {
        //     $this->errors['delivery_time'] = "Time must be at least 30 minutes ahead of the current time";
        // }

        if (empty($data['is_gift'])) {
            $this->errors['is_gift'] = "Please select whether to send as a gift or not";
        }

        if (empty($data['payment_method'])) {
            $this->errors['payment_method'] = "Please select a payment method";
        }

        if (empty($this->errors)) {
            return $data;
        }
        return false;
    }

    public function saveData($data)
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }

        // Get the user id from the session
        $userId = $_SESSION['USER_DATA']->id;

        // Add the user id to the data array
        $data['customer_id'] = $userId;

        // Set deliver_id to NULL initially
        $data['deliver_id'] = NULL;

        $keys = array_keys($data);
        $values = array_values($data);

        $query = "INSERT INTO `" . $this->table . "`";
        $query .= " (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";

        $result = $this->query($query, $data);

        return $result !== false;
    }
}

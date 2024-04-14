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
        'payement_status',
        'is_gift',
        'payment_method',
        'note'
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
        } elseif (date('Y-m-d', strtotime($data['delivery_date'])) != date('Y-m-d')) {
            $this->errors['delivery_date'] = "Date must be the current date";
        }

        if (empty($data['delivery_time'])) {
            $this->errors['delivery_time'] = "Time is required";
        } elseif (strtotime($data['delivery_time']) < strtotime('now') + 1800) {
            $this->errors['delivery_time'] = "Time must be at least 30 minutes ahead of the current time";
        }

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

        // Retrieve the address, latitude, and longitude from the form data
        $data['delivery_address'] = $_POST['check_address'];
        $data['latitude'] = $_POST['latitude'];
        $data['longitude'] = $_POST['longitude'];

        $keys = array_keys($data);
        $values = array_values($data);

        $query = "INSERT INTO `" . $this->table . "`";
        $query .= " (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";

        $pdo = $this->query2($query, $data);

        if ($pdo instanceof PDO) {
            $lastInsertId = $pdo->lastInsertId();

            // Insert order items
            $productIds = $_POST['product_ids'];
            $quantities = $_POST['quantities'];

            for ($i = 0; $i < count($productIds); $i++) {
                $productId = $productIds[$i];
                $quantity = $quantities[$i];

                $orderItemData = [
                    'order_id' => $lastInsertId,
                    'product_id' => $productId,
                    'quantity' => $quantity,
                ];

                $keys = array_keys($orderItemData);
                $values = array_values($orderItemData);

                $query = "INSERT INTO `orderitems`";
                $query .= " (" . implode(",", $keys) . ") VALUES (:" . implode(",:", $keys) . ")";

                $this->query2($query, $orderItemData);
            }

            return $lastInsertId;
        }

        return false;
    }


    public function getLastOrderStatus($userId)
    {
        $query = "SELECT `order_status` FROM `" . $this->table . "` WHERE `customer_id` = :userId ORDER BY `id` DESC LIMIT 1";
        $result = $this->query($query, ['userId' => $userId]);

        if ($result) {
            return $result[0]->order_status;
        }

        return false;
    }

    public function getLastOrderId($userId)
    {
        $query = "SELECT `id` FROM `" . $this->table . "` WHERE `customer_id` = :userId ORDER BY `id` DESC LIMIT 1";
        $result = $this->query($query, ['userId' => $userId]);

        if ($result) {
            return $result[0]->id;
        }

        return false;
    }
}

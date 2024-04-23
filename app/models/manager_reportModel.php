<?php

class manager_reportModel extends Model
{
    public $table = "checkout";
    public $errors = [];
    protected $allowedColumns = [
        'id',
        'name',
        'delivery_or_pickup',
        'payment_method',
        'is_gift',

    ];

    public function get_all()
    {
        $query = "SELECT * FROM {$this->table} WHERE delivery_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND pickup_location = 'borella'";
        return $this->query($query);
    }

    public function get_summary_data()
    {
        // Calculate total income
        $query = "SELECT SUM(total_cost) AS total_income FROM {$this->table} WHERE delivery_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND pickup_location = 'borella'";
        $result = $this->query($query);
        $total_income = $result[0]->total_income;

        // Calculate number of orders
        $query = "SELECT COUNT(*) AS num_orders FROM {$this->table} WHERE delivery_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND pickup_location = 'borella'";
        $result = $this->query($query);
        $num_orders = $result[0]->num_orders;

        // Calculate average order value
        $average_order_value = $total_income / $num_orders;

        // Get most common payment method
        $query = "SELECT payment_method, COUNT(*) AS count FROM {$this->table} WHERE delivery_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND pickup_location = 'borella' GROUP BY payment_method ORDER BY count DESC LIMIT 1";
        $result = $this->query($query);
        $most_common_payment_method = $result[0]->payment_method;

        // Get order status breakdown
        $query = "SELECT order_status, COUNT(*) AS count FROM {$this->table} WHERE delivery_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND pickup_location = 'borella' GROUP BY order_status";
        $order_status_breakdown = $this->query($query);

        // Get number of deliveries and pickups
        $query = "SELECT delivery_or_pickup, COUNT(*) AS count FROM {$this->table} WHERE delivery_date >= DATE_SUB(CURDATE(), INTERVAL 30 DAY) AND pickup_location = 'borella' GROUP BY delivery_or_pickup";
        $delivery_pickup_counts = $this->query($query);

        return [
            'total_income' => $total_income,
            'num_orders' => $num_orders,
            'average_order_value' => $average_order_value,
            'most_common_payment_method' => $most_common_payment_method,
            'order_status_breakdown' => $order_status_breakdown,
            'delivery_pickup_counts' => $delivery_pickup_counts,
        ];
    }
}

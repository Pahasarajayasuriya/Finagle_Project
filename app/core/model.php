<?php

// main model class
class Model extends Database
{
    protected $table = "";
    protected $limit        = 10;
    protected $offset       = 0;
    protected $order_type   = 'ASC';
    protected $order_column = 'id';
    protected $allowedColumns = [

        'username',
        'email',
        'password',
        'teleno',
        'role',
    ];


    public function insert($data)
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        $keys = array_keys($data);
        // $values = array_values($data);
        $query = "insert into " . $this->table;
        $query .= " (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";

        $this->query($query, $data);
    }

    public function findAll($order_column = 'id', $order_type = 'ASC', $limit = 10)
    {

        $quary = "SELECT * FROM {$this->table} ORDER BY $order_column $order_type LIMIT $limit OFFSET $this->offset";

        //echo $quary;
        // run the quary stage
        return $this->query($quary);
    }



    public function findAllPlacedOrders($branch)
    {

        $query = "SELECT * FROM {$this->table} WHERE order_status= 'order placed' AND pickup_location = '$branch' ";

        //echo $query;
        // run the quary stage
        return $this->query($query);
    }

    
    public function findAllReadyOrders($branch)
    {

        $quary = "SELECT * FROM {$this->table} WHERE order_status='order preparing' AND pickup_location = '$branch' ";

        
        return $this->query($quary);
    }

    public function findAllDispatchOrders($branch)
    {

        $quary = "SELECT * FROM {$this->table} WHERE order_status='order dispatch' AND pickup_location = '$branch' ";

        
        return $this->query($quary);
    }


    public function findAllProducts($branch)
    {

        $quary = "SELECT * FROM {$this->table} WHERE branch_name = '$branch' ";

        //echo $quary;
        // run the quary stage
        return $this->query($quary);
    }

    public function count_online()
    {
        $query = "SELECT COUNT(*) AS online_delivery_count FROM {$this->table} WHERE delivery_or_pickup ='delivery'";
        return $this->query($query);
    }



    public function count_pickup()
    {
        $query = "SELECT COUNT(*) AS pickup_count FROM {$this->table} WHERE delivery_or_pickup ='pickup'";
        return $this->query($query);
    }


    public function where($data)
    {
        $keys = array_keys($data);

        $query = "select * from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }
        $query = trim($query, "&& ");
        $res = $this->query($query, $data);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }


    public function findUsersByRole($branch, $user_role)
    {

        $query = "SELECT * FROM {$this->table} WHERE branch = '$branch' AND {$this->table}.role = '$user_role'";

        return $this->query($query);
    }


    public function findDrivers($driver_id)
    {

        $query = "SELECT * FROM {$this->table} WHERE id = $driver_id AND {$this->table}.role= 'deliverer'";

        return $this->query($query);
    }

    public function find_driver_deliveredOrders($driver_id)
    {
        $query = "SELECT COUNT(*) AS delivered_count FROM {$this->table} WHERE deliver_id = $driver_id";

        return $this->query($query);
    }

    public function find_total_earnings($driver_id)
    {

        $query = "SELECT SUM(total_cost) AS totalCost FROM {$this->table} WHERE deliver_id = $driver_id";

        return $this->query($query);
    }

    


    public function first($data)
    {
        $keys = array_keys($data);

        $query = "select * from " . $this->table . " where ";

        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . " && ";
        }
        $query = trim($query, "&& ");
        $query .= " order by id desc limit 1";

        $res = $this->query($query, $data);
        if (is_array($res)) {
            return $res[0];
        }

        return false;
    }

    public function update($id, $data)
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        
        // Modify the data array to set 'order-status' to 'delivered'
        // $data['order_status'] = 'delivered';
    
        $keys = array_keys($data);
    
        $query = "update " . $this->table . " set ";
        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . ",";
        }
    
        $query = trim($query, ",");
        $query .= " where id = :id ";
    
        $data['id'] = $id;
    
        // echo  $query;

        $this->query($query, $data);
    }
    

    public function updateOrder($id, $data)
    {
        if (!empty($this->allowedColumns)) {
            foreach ($data as $key => $value) {
                if (!in_array($key, $this->allowedColumns)) {
                    unset($data[$key]);
                }
            }
        }
        
        // Modify the data array to set 'order-status' to 'delivered'
        // $data['order_status'] = 'delivered';
    
        $keys = array_keys($data);
    
        $query = "update " . $this->table . " set ";
        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . ",";
        }
    
        $query = trim($query, ",");
        $query .= " where id = :id ";
    
        $data['id'] = $id;
    
        $this->query($query, $data);
    }
    

    public function all()
    {
        $query = "SELECT * FROM {$this->table}";
        return $this->query($query);
    }

    public function countall()
    {
        $query = "SELECT  COUNT(*) AS total_records FROM {$this->table}";
        return $this->query($query);
    }

    public function count_Customers()
    {
        $query = "SELECT  COUNT(*) AS total_customers FROM {$this->table} WHERE {$this->table}.role= 'customer'";
        return $this->query($query);
    }

    public function sumOfColumn()
    {
        $query = "SELECT SUM(total_cost) AS total_sum FROM {$this->table}";
        return $this->query($query);
    }

    public function findOrderdetails()
    {

        $orderitemsTable = 'orderitems';
        $productsTable = 'products';
        $usersTable = 'users';

        $query = "SELECT p.user_name, oi.quantity , p.price ,c.id,c.customer_id,c.phone_number,c.deliver_id,c.delivery_or_pickup ,c.order_status,c.order_status,c.total_cost,c.payment_method,c.deliver_id,c.delivery_date,c.delivery_address,c.latitude,c.longitude
                  FROM {$this->table} c
                  JOIN  $orderitemsTable oi ON c.id = oi.order_id
                  JOIN $productsTable p ON oi.product_id = p.id
                
                  ";

         return $this->query($query);
    }

//     public function generateTotal($order_id)
// {
//     $orderitemsTable = 'orderitems';
//     $productsTable = 'products';

//     $query = "SELECT oi_total.total AS checkout_total
//               FROM {$this->table} c
//               JOIN (
//                   SELECT oi.order_id, SUM(p.price * oi.quantity) AS total
//                   FROM   $orderitemsTable  oi
//                   JOIN  $productsTable p ON oi.product_id = p.id
//                   GROUP BY oi.order_id
//               ) AS oi_total ON c.id = oi_total.order_id
//               WHERE  c.id = $order_id";

//     $result = $this->query($query);

   
//     $checkout_total = $result['checkout_total']; 

   
//     $updateQuery = "UPDATE {$this->table} SET total_cost = $checkout_total WHERE id = $order_id";
//     $this->query($updateQuery);

//     return $result;
// }

    

    public function where_withInner($data, $reference_table, $refe_column1 = 'id', $refe_column2 = 'id')
    {

        $keys = array_keys($data);


        $query = "SELECT * FROM $this->table JOIN $reference_table 
                            ON $this->table.$refe_column1 = $reference_table.$refe_column2";

        $query .= " WHERE ";

        foreach ($keys as $key) {
            $query .= $this->table . "." . $key . "=:" . $key . " && ";
        }
        $query = trim($query, "&& ");

        $query .= " ORDER BY $refe_column1 $this->order_type LIMIT $this->limit OFFSET $this->offset";

        // echo $query;

        $res = $this->query($query, $data);
        if (is_array($res)) {
            return $res;
        }

        return false;
    }

    public function findSuccessOrders($branch)
    {
        $usersTable = 'users';

        $query = "SELECT c.id , c.deliver_id , u.image ,u.username, c.view_status 
        FROM {$this->table} c 
        JOIN  $usersTable u ON c.deliver_id = u.id

        WHERE pickup_location = '$branch' AND order_status = 'order delivered' AND delivery_or_pickup ='delivery' ";

        return $this->query($query);
    }
}

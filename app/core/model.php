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


    public function findUsersByRole($branch_id, $user_role)
{

    $query = "SELECT * FROM {$this->table} WHERE branch_id = $branch_id AND user_role = '$user_role'";
   
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
        $keys = array_keys($data);
        // $values = array_values($data)

        $query = "update " . $this->table . " set ";
        foreach ($keys as $key) {
            $query .= $key . "=:" . $key . ",";
        }

        $query = trim($query, ",");
        $query .= " where id = :id ";

        $data['id'] = $id;
        // show($query);
        // show($data);die;
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

    public function sumOfColumn()
   {
    $query = "SELECT SUM(total_cost) AS total_sum FROM {$this->table}";
    return $this->query($query);
   }   

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
}

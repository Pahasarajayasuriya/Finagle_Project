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

    public function findAll($order_column = 'id')
    {

        $quary = "SELECT * FROM $this->table ORDER BY $order_column $this->order_type LIMIT $this->limit OFFSET $this->offset";

        // echo $quary;
        // run the quary stage
        return $this->query($quary);
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
}

<?php

class Database
{

    private function connect()
    {
        $str = DBDRIVER . ":hostname=" . DBHOST . ";dbname=" . DBNAME;
        return new PDO($str, DBUSER, DBPASS);
    }

    public function prepare($query)
    {
        return $this->connect()->prepare($query);
    }

    public function query($query, $data = [], $type = 'object')
    {
        $con = $this->connect();

        $stm = $con->prepare($query);
        if ($stm) {
            $check =  $stm->execute($data);
            if ($check) {
                if ($type == 'object') {
                    $type = PDO::FETCH_OBJ;
                } else {
                    $type = PDO::FETCH_ASSOC;
                }
                $result = $stm->fetchAll($type);
                if (is_array($result) && count($result) > 0) {
                    return $result;
                }
            }
        }

        return false;
    }
    public function read($query, $data = [])
    {
        return $this->query($query, $data, 'assoc');
    }

    public function create_tables()
    {
        $query = "
        CREATE TABLE IF NOT EXISTS `user` (
            `id` int(11) NOT NULL AUTO_INCREMENT,
            `username` varchar(255) NOT NULL,
            `email` varchar(255) NOT NULL,
            `password` varchar(255) NOT NULL,
            `teleno` varchar(255) NOT NULL,
            PRIMARY KEY (`id`)
           ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
        ";

        $this->query($query);
    }
}

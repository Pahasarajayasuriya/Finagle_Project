<?php

define('APPNAME','Finagle Lanka (Pvt)Ltd');

if($_SERVER['SERVER_NAME'] == 'localhost'){
     
    //database config for local server
    define('DBHOST', 'localhost');
    define('DBNAME', 'finagle');
    define('DBUSER', 'root');
    define('DBPASS', 'root');
    define('DBDRIVER', 'mysql');

    define('ROOT','http://localhost:8888/finagle/public');
}else {

    //database config for live server
    define('DBHOST', 'localhost');
    define('DBNAME', 'finagle');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', 'mysql');
}
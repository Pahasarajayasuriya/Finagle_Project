<?php

class Auth
{
    public static function authenticate($row)
    {
        if (is_object($row)) {
            $_SESSION['USER_DATA'] =  $row;
        }
    }

    public static function logout()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            unset($_SESSION['USER_DATA']);

            // session_unset();
            // session_regenerate_id();
        }
    }

    public static function logged_in()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            return true;
        }

        return false;
    }

    public static function is_admin()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'admin') {
                return true;
            }
        }

        return false;
    }

    public static function is_customer()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'customer') {
                return true;
            }
        }

        return false;
    }

    public static function is_manager()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'manager') {
                return true;
            }
        }

        return false;
    }

    public static function is_employee()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'employee') {
                return true;
            }
        }

        return false;
    }

    public static function is_deliverer()
    {
        if (!empty($_SESSION['USER_DATA'])) {
            if ($_SESSION['USER_DATA']->role == 'deliverer') {
                return true;
            }
        }

        return false;
    }

    public static function __callStatic($funcname, $args)
    {
        $key = str_replace("get", "", strtolower($funcname));
        if (!empty($_SESSION['USER_DATA']->$key)) {
            return $_SESSION['USER_DATA']->$key;
        }
        return '';
    }

    public static function getName()
    {
        return $_SESSION['USER_DATA']->username;
    }

    public static function getTeleno()
    {
        return $_SESSION['USER_DATA']->teleno;
    }

    public static function getEmail()
    {
        return $_SESSION['USER_DATA']->email;
    }
}

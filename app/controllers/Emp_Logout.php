<?php

class Emp_Logout extends Controller
{
    public function index()
    {
        Auth::logout();

        redirect('login');
    }
}

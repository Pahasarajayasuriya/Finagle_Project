<?php

class Emp_dashboard extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = "EmpDashboard";
        $this->view('employee/employee_dashboard', $data);
    }

    // public function profile($id = null)
    // {
        
    //     $id = $id ?? Auth::getId();

    //     $user = new User();
    //     $data['row'] = $user->first(['id'=>$id]);
        

    //     $data['title'] = "Profile";
    //     $this->view('customer/cus_profile', $data);
    // }
}

<?php

class Emp_progress extends Controller
{
    public function index($id = null)
    {
        $id = $id ?? Auth::getId();

        $user = new User();
        $data['row'] = $user->first(['id'=>$id]);
        $data['title'] = "Progress";
        $this->view('employee/progress', $data);
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
